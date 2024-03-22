<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assign_prizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rank_category_id')->nullable();
            $table->foreign('rank_category_id')->references('id')->on('rank_categories');
            $table->unsignedBigInteger('prize_id')->nullable();
            $table->foreign('prize_id')->references('id')->on('prizes');
            $table->integer('amount');
            $table->integer('odds_of_winning');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_prizes');
    }
};
