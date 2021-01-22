<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            //Primary Key
            $table->id();
            
            //City column
            $table->string("city", 20);

            //Street column
            $table->string("street", 30);

            //Post Code
            $table->string("post_code", 15);

            //Dont need the timestamp on this table for now
            //$table->timestamps();

            //Engine to be used
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
