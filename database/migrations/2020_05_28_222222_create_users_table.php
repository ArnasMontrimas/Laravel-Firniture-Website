<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            //Primary Key
            $table->id();

            //Foreign key column (Addresses Table)
            $table->foreignId('address_id')
                    ->constrained("addresses")
                    ->onDelete("cascade");

            //Name Column
            $table->string('name', 20);

            //Surname Column
            $table->string("surname", 20);

            //Email Column
            $table->string('email')->unique();

            //Will skip the email verification for now
            //$table->timestamp('email_verified_at')->nullable();

            //Password Column
            $table->string('password');

            //Employee type column
            $table->enum("type", ['admin','supervisor','production']);

            //Employee salary column
            $table->decimal('salary', 9, 2);

            //I will define my own timestamp column
            $table->timestamp("start_date", 6);
            
            //This table serves as protection againts "Remember Me" cookie hijacking
            $table->rememberToken();

            //This will make "created_at" and "updated_at" columns
            //$table->timestamps();
            
            //Define engine
            $table->engine = "InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
