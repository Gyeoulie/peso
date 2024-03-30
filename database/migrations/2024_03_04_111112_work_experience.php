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
        Schema::create('work_experience', function (Blueprint $table) {
            $table->id('workexp_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('work_Name', 255);
            $table->text('work_Address');
            $table->unsignedBigInteger('position_id');
            $table->date('work_Start');
            $table->date('work_End');
            $table->string('work_Status',255);
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade')
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
        Schema::dropIfExists('work_experience');
    }
};
