<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixUserIdForeignKeyOnRentalsTable extends Migration
{
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop FK lama ke users

            $table->foreign('user_id')
                ->references('id')
                ->on('customers')  // Ganti jadi ke tabel customers
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop FK ke customers

            $table->foreign('user_id')
                ->references('id')
                ->on('users')  // Kembalikan ke tabel users
                ->onDelete('cascade');
        });
    }
}
