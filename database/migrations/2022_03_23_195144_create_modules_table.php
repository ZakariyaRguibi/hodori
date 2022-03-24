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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("details")->nullable();
            $table->unsignedFloat("coefficient",1,3);
            $table->foreignId('level_id')
                ->constrained('levels')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            //chef de module
            $table->foreignId('module_head_id')
                ->constrained('professors')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('Set NULL');


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
        Schema::dropIfExists('modules');
    }
};
