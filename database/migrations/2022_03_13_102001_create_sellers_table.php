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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name',32);
            $table->string('email',32)->unique();
            $table->string('password');
            $table->string('phone',11)->unique();
            $table->bigInteger('national_id')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default(1)->comment("1=>active ,0=> not active ");
            $table->enum('gender',['f','m']);
            // $table->string('image')->default("seller.jpg");
            $table->string('socialLinks')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('sellers');
    }
};
