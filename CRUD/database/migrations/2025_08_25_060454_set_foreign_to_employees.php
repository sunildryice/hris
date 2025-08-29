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
        Schema::table('employees', function (Blueprint $table) {
   
    $table->foreign('dep_id')
          ->references('dep_id')->on('departments')
          ->onDelete('cascade')
          ->onUpdate('cascade');

    $table->foreign('desig_id')
          ->references('desig_id')->on('designations')
          ->onDelete('cascade')
          ->onUpdate('cascade');
});


    

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
