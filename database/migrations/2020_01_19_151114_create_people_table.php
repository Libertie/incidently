<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('nickname', 100);
            $table->string('hair_color', 100);
            $table->string('hair_length', 100);
            $table->string('height', 100);
            $table->string('skin', 100);
            $table->string('gender', 100);
            $table->string('voice', 100);
            $table->string('age', 100);
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('incident_person', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('incident_id');
            $table->unsignedBigInteger('person_id');
            $table->timestamps();

            $table->unique(['incident_id', 'person_id']);

            $table->foreign('incident_id')
                ->references('id')->on('incidents')
                ->onDelete('cascade');
            $table->foreign('person_id')
                ->references('id')->on('people')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
