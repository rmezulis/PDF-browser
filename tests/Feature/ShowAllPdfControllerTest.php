<?php

namespace Tests\Feature;

use App\Pdf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ShowAllPdfControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testRouteExists(): void
    {
        factory(Pdf::class)->create();
        $response = $this->get('/');
        $response->assertOk();
    }

    public function testAddNewButtonExists(): void
    {
        $response = $this->get('/');
        $response->assertSeeText('Add new document');
    }
}
