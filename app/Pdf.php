<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pdf extends Model
{
    protected $table = 'pdf';

    protected $fillable = [
        'name',
        'file',
        'thumbnail'
    ];

    public function getPdf()
    {
        return Storage::url($this->file);
    }

    public function getThumbnail()
    {
        return Storage::url($this->thumbnail);
    }
}
