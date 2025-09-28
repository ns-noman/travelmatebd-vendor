<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->enum('vendor_type', ['airline', 'hotel', 'transport', 'tour_operator', 'other'])->default('tour_operator');
            $table->string('name', 191);
            $table->string('contact_person', 191)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 191)->nullable();
            $table->text('address')->nullable();
            $table->string('country', 100)->nullable();
            $table->decimal('commission_rate', 5, 2)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
};
