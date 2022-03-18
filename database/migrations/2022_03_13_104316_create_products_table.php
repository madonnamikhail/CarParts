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
            $table->string('name',512);
            $table->longText('description',255);
            $table->string('code',32)->unique();
            $table->tinyInteger('quantity');
            $table->decimal('price');
            $table->tinyInteger('status')->default(1)->comment("1=>active ,0=> not active ");
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
