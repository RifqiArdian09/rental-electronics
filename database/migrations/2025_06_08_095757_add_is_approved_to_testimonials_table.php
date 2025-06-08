<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('testimonials', function (Blueprint $table) {
        $table->boolean('is_approved')->default(false)->after('rating');
    });
}

public function down()
{
    Schema::table('testimonials', function (Blueprint $table) {
        $table->dropColumn('is_approved');
    });
}

};
