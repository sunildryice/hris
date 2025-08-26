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
        Schema::create('details', function (Blueprint $table) {
            $table->id('det_id');
            $table->unsignedInteger('emp_id');
            $table->string('emerg_contact');
            $table->string('emerg_name');
            $table->string('relation');
            $table->string('blood_group');
            $table->timestamps();

         
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
