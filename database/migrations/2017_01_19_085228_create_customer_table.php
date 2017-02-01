<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('NickName',10);
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Address1');
            $table->string('Address2')->nullable();
            $table->string('City');
            $table->string('Region',80)->nullable();
            $table->string('PostalCode',20);
            $table->integer('IdCountry')->unsigned();
            $table->foreign('IdCountry')->references('Id')->on('country');
            $table->string('Phone',40)->nullable();
            $table->string('Mobile',40)->nullable();
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
        Schema::table('customer', function(Blueprint $table) {
            $table->dropForeign(['IdCountry']);
            $table->removeColumn('IdCountry');
        });
        Schema::dropIfExists('customer');
    }
}
