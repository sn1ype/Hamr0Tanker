<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTankersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tankers', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("desc");
            $table->double("price");
            $table->integer("capacity");
            $table->string("image");
            $table->string('water_source');
            $table->string("status")->default('available');
            $table->integer("views")->default(1);
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
        Schema::dropIfExists('tankers');
    }
}
