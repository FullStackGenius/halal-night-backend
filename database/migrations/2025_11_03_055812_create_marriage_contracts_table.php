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
        Schema::create('marriage_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('husbandName');
            $table->string('wifeName');
            $table->string('mahr')->nullable();
            $table->string('duration')->nullable();
            $table->date('startDate')->nullable();
            $table->string('location')->nullable();
            $table->text('conditions')->nullable();
            $table->string('witness1Name')->nullable();
            $table->string('witness1Address')->nullable();
            $table->string('witness2Name')->nullable();
            $table->string('witness2Address')->nullable();
            $table->boolean('consent')->default(false);
            $table->string('signature_husband')->nullable();
            $table->string('signature_wife')->nullable();
            $table->string('signature_witness1')->nullable();
            $table->string('signature_witness2')->nullable();
            $table->string('certificate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_contracts');
    }
};
