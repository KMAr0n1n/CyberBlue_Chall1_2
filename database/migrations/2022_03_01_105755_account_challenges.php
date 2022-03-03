<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_challenges', function (Blueprint $table) {
            $table->integer('account_id')->unsigned();
            $table->integer('challenge_id')->unsigned();
            $table->integer('points');
            $table->timestamps();
            $table->foreign('account_id')->references('id')->on('accounts') ->onDelete('cascade');
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_challenges');
    }
};
