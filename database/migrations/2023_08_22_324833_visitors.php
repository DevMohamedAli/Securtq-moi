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
        Schema::create(
            'visitors',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('id_card_number');
                $table->enum('id_card_type', ['idcard', 'passport', 'other']);
                $table->string('work_place');
                $table->string('picture');
                $table->enum('armed', ['yes', 'no']);
                $table->foreignId('gun_id')->nullable()->constrained('guns');
                $table->foreignId('nationality_id')->references('id')->on('nationalities');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('visitor');
    }
};
