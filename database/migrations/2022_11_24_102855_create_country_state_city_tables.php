<?php

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


return new class extends Migration

{

    public function up()

    {

        Schema::create('countries', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->timestamps();

        });

        Schema::create('states', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->integer('country_id');            

            $table->timestamps();

        });

        Schema::create('cities', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->integer('state_id');            

            $table->timestamps();

        });

    }

   public function down()

    {

       Schema::drop('countries');

       Schema::drop('states');

       Schema::drop('cities');

    }

};