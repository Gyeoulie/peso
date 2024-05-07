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
        Schema::create('peso', function (Blueprint $table) {
            $table->id('peso_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('peso_Pnum', 20)->nullable();
            $table->string('peso_Tnum', 20)->nullable();
            $table->string('peso_Fnum', 20)->nullable();
            $table->string('peso_Email', 255)->nullable();
            $table->unsignedBigInteger('municipality_id');
            $table->timestamps(); // Adds created_at and updated_at columns

            $table->foreign('municipality_id')->references('municipality_id')->on('municipality')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peso');
    }
};
