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
        Schema::create('training', function (Blueprint $table) {
            $table->id('training_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('training_Name', 255);
            $table->string('training_From', 255);
            $table->string('training_Cert', 255);
            $table->date('training_Start');
            $table->date('training_End');
            $table->tinyInteger('training_Status');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training');
    }
};
