@extends('layouts.layout')

@section('content')
    <div>
        <button data-toggle="modal" data-target=".new-pdf" class="btn btn-primary">Add new document</button>
    </div>
    @if($errors->has('pdf'))
        <p class="text-danger">The file must be a PDF file!</p>
    @endif
    <div class="modal fade new-pdf" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New pdf</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('pdf.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pdf">Select a pdf to upload:</label>
                            <input type="file" accept="application/pdf" class="form-control-file" id="pdf" name="pdf">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div>
        @foreach($pdfs as $pdf)
            <div class="d-inline-flex p-2">
                <a href="" data-toggle="modal" data-target="#modal-{{$pdf->id}}">
                    <div class="card" style="
                        width: 200px;
                        background-image: url({{ $pdf->getThumbnail() }});
                        background-repeat: no-repeat;
                        background-size: cover;
                        height: 250px">
                    </div>
                </a>
            </div>
            <div class="modal fade" id="modal-{{$pdf->id}}" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable display-pdf modal-xl">
                    <div class="modal-content display-pdf">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $pdf->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <object class="display-pdf" data="{{ $pdf->getPdf() }}" type="application/pdf">
                            <embed src="{{ $pdf->getPdf() }}" type="application/pdf" />
                        </object>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection
