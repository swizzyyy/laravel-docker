<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('rank_category_id')->nullable();
            $table->foreign('rank_category_id')->references('id')->on('rank_categories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ranks');
    }
};
