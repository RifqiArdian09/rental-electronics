<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_contacts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama pengirim
            $table->string('email'); // email pengirim
            $table->string('phone')->nullable(); // nomor telepon
            $table->string('subject'); // subjek pesan
            $table->text('message'); // isi pesan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
