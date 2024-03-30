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
        Schema::create('certificate', function (Blueprint $table) {
            $table->id('cert_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('cert_Type_id');
            $table->string('cert_From', 255);
            $table->date('cert_Date_Issued');
            $table->string('cert_Rating', 10);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('cert_Type_id')->references('cert_type_id')->on('certificate_type')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate');
    }
};
