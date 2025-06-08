<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('customers')->onDelete('cascade');
            $table->text('message');
            $table->tinyInteger('rating')->default(5); // Skala 1-5
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('testimonials');
    }
};