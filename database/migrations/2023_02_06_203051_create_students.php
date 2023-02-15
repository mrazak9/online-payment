<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('place_birth');
            $table->date('date_birth');
            $table->string('gender');
            $table->text('address')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->text('photo')->nullable();
            $table->string('join_period');
            $table->string('status')->default('active');
            $table->foreignId('faculty_id')->constrained('faculties')->onDelete('cascade');
            $table->foreignId('concent_id')->constrained('concentrations')->onDelete('cascade')->nullable();
            $table->foreignId('prodi_id')->constrained('program_studies')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
