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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_price');
            $table->tinyInteger('status')->default(1)->comment("1=>pending , 2=>shipped , 3=>delivered ,0=>canceled ");
            $table->string('code',10)->unique();
            $table->foreignId('address_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('payment_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('coupon_id')->nullable()->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->decimal('final_price');
            $table->timestamp('deliver_at')->nullable();

            // $table->date('deleted_at'); by soft delete
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
        Schema::dropIfExists('orders');
    }
};
