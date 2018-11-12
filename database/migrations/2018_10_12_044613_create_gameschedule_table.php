<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamescheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_schedule',function(Blueprint $table){
            $table->increments('id');
            $table->string('title',255);
            $table->longText('description')->nullable();
            $table->string('date');
            $table->integer('added_by');
            $table->tinyinteger('status')->default(0);
            $table->float('bet_amount');
            $table->string('result',11)->nullable();
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
        Schema::dropIfExists('game_schedule');
    }
}
