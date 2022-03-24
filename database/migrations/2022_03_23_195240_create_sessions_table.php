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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();

            $table->date("date");
            $table->time("hour_start");
            $table->time("hour_finish");
            $table->enum('type',['cour','td','tp']);
            $table->unsignedSmallInteger("number_of_hours");

            $table->foreignId('element_id')
                ->constrained('elements')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('professor_id')
                ->constrained('professors')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('sessions');
    }
};
