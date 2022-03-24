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

        //this is a table that hold all the professors ids and their corresponding elements
        Schema::create('professors_elements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('professor_id')
                ->constrained('professors')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('element_id')
                ->constrained('elements')
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
        Schema::dropIfExists('professors_elements');
    }
};
