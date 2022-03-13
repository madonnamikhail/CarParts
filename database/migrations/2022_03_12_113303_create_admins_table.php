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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->string('phone',25)->unique();
            $table->string('email',255)->unique();
            $table->string('password',255);
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default(0)->comment("0=>not active admin,1=>active admin");
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
        Schema::dropIfExists('admins');
    }
};
