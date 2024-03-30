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
        Schema::create('eligibility', function (Blueprint $table) {
            $table->id('eligibility_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('eligibility_Type');
            $table->date('eligibility_Date');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('eligibility_Type')->references('eligibility_type_id')->on('eligibility_type')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eligibility');
    }
};
