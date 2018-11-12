<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices',function(Blueprint $table){
            $table->increments('id');
            $table->integer('gameid');
            $table->float('firstquarter')->nullable();
            $table->float('secondquarter')->nullable();
            $table->float('thirdquarter')->nullable();
            $table->float('fourthquarter')->nullable();
            $table->string('grandprice',255);
            $table->integer('addedby');
            $table->string('winner',50)->nullable();
            $table->integer('claimed')->nullable();
            $table->dateTime('created_at');
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
