<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsTable extends Migration
{
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('name');               
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->unsignedInteger('stock');    
            $table->unsignedBigInteger('price_per_day'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tools');
    }
}
