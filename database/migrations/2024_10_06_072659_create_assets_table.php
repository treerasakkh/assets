<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('item_name_id')->constrained();
            $table->string('brand_model');
            $table->integer('amount');
            $table->string('location_id')->constrained();
            $table->string('image')->nullable();
            $table->string('status');
            $table->string('responsible_person_id')->constrained();
            $table->integer('user_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assets');
    }
};