<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32)->unique();
            $table->string('photo', 200)->unique(); //photo
            $table->float('price', 10, 2)->nullable();
            $table->float('price_k', 10, 2)->nullable();
            $table->boolean('isBought');
            $table->boolean('userLike')->nullable();
            $table->boolean('priceUp')->nullable();
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
        Schema::dropIfExists('ingredients');
    }
};
