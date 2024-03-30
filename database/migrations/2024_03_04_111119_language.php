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
        Schema::create('language', function (Blueprint $table) {
            $table->id('language_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('language_Type', 255);
            $table->tinyInteger('language_read');
            $table->tinyInteger('language_write');
            $table->tinyInteger('language_speak');
            $table->tinyInteger('language_understand');
            $table->timestamps(); // Adds created_at and updated_at columns

            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language');
    }
};
