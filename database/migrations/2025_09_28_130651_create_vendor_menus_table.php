<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('vendor_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);
            $table->integer('srln')->default(1);
            $table->string('menu_name', 255);
            $table->string('navicon', 255)->nullable();
            $table->tinyInteger('is_side_menu')->default(0);
            $table->string('create_route', 255)->nullable();
            $table->string('route', 255)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('vendor_menus');
    }
};
