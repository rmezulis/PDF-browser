<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfTable extends Migration
{
    public function up(): void
    {
        Schema::create('pdf', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pdf');
    }
}
