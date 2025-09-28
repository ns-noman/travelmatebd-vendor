<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id');
            $table->string('name', 191);
            $table->string('username', 100)->unique();
            $table->integer('type');
            $table->string('mobile', 50)->nullable();
            $table->string('email', 191)->unique();
            $table->string('password', 255);
            $table->string('image', 255)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
