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
        Schema::create('sugerence_recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 32);
            // $table->string('photo', 200)->nullable();
            $table->string('ingredients');
            $table->string('description', 2000);
            $table->boolean('isChecked');
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
        Schema::dropIfExists('sugerence_recipes');
    }
};
