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
        Schema::create('job_tags', function (Blueprint $table) {
            $table->id('job_tags_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('position_id');
            $table->timestamps();

            $table->foreign('job_id')->references('job_id')->on('job_posting')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('position_id')->references('position_id')->on('job_positions')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_tag');
    }
};
