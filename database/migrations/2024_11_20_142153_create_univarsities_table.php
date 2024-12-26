<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('univarsities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->uniquie();
            $table->foreignId('country_id')->constrained()->onDelete('cascade'); 
            $table->string('short_name')->nullable();
            $table->string('logo', 1000)->nullable();
            $table->string('cover_photo', 1000)->nullable();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('univarsities');
    }
};
