<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Description',1024)->nullable();
            $table->string('Name')->required();
            $table->float('Price')->nullable();
            $table->float('ShippingCost')->nullable();
            $table->integer('TotalRating')->nullable();
            $table->string('Thumbnail')->nullable();
            $table->string('Image')->nullable();
            $table->float('DiscountPercentage')->nullable();
            $table->integer('Votes')->nullable();
            $table->string('Supplier');
            $table->integer('IdCategory')->unsigned();
            $table->foreign('IdCategory')->references('Id')->on('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function(Blueprint $table) {
            $table->dropForeign(['IdCategory']);
            $table->removeColumn('IdCategory');
        });
        Schema::dropIfExists('product');
    }
}
