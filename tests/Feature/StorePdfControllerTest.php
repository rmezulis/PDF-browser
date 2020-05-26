<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class StorePdfControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStoredSuccessful()
    {
        $pdf = UploadedFile::fake()->create('test.pdf');
        $this->followingRedirects();
        $response = $this->post('/', [
            'pdf' => $pdf
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('pdf', [
            'name' => 'test.pdf'
        ]);

    }
}
