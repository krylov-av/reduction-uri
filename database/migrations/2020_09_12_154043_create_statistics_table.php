<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id');//default('gen_random_uuid()')
            $table->primary('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('link_id');
            $table->string('user_agent');
            //$table->unsignedInteger('ip');
            //$table->string('ip',15);
            $table->ipAddress('ip');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('link_id')->references('id')->on('links');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
