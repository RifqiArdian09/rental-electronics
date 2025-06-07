<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTotalPriceNullableOnRentalsTable extends Migration
{
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->integer('total_price')->nullable()->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->integer('total_price')->nullable(false)->default(null)->change();
        });
    }
}
