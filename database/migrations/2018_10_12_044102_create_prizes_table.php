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
            $table->integer('gameid',11);
            $table->float('firstquarter');
            $table->float('secondquarter');
            $table->float('thirdquarter');
            $table->float('fourthquarter');
            $table->string('grandprice',255);
            $table->integer('addedby',11);
            $table->string('winner',50);
            $table->integer('claimed',11);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
