<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            //Primary Key
            $table->id();
            
            //Name column
            $table->string('name', 50);

            //Type column
            $table->string('type', 20);

            //Parts column
            $table->integer('parts');

            //Selling price column
            $table->float('selling_price', 10, 2);

            //Material Cost column
            $table->float('material_cost', 10, 2);

            //Cost per part column
            $table->float('cost_per_part', 10, 2);

            //Estimate build time column
            $table->integer('build_time');

            //This table keeps track if the product building is, waiting, building, completed
            $table->enum('status', ['waiting','building','completed'])
                ->default('waiting');

            //Product image column
            $table->string('img');

            //Define engine
            $table->engine = 'InnoDB';
            //Will not be using default timestamp
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
