<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vendor_privileges', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id');
            $table->integer('role_id');
            $table->integer('menu_id');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('vendor_privileges');
    }
};
