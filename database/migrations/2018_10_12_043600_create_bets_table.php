<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets',function(Blueprint $table){
            $table->primary('id')->autoIncrement();
            $table->string('playerid',50);
            $table->integer('gameid',11);
            $table->string('bet',11);
            $table->tinyinteger('status',2);
            $table->dateTime('created_at')->default("2019-09-09 00:00:00");
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
        //
    }
}
