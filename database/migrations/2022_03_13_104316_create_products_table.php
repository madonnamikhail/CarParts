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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->string('description',255);
            $table->string('code',10)->unique();
            $table->integer('quantity');
            $table->integer('price');
            $table->tinyInteger('status')->default(0);
            $table->foreignId('model_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('shop_id')->constrained();


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
        Schema::dropIfExists('products');
    }
};
