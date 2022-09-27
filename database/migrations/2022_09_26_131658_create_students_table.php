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
            $table->string('full_name');
            $table->string('age');
            $table->string('photo');
            $table->string('phone');
            $table->string('whatsapp_no');
            $table->string('email');
            $table->integer('residential_address');
            $table->string('pri_sch_attended');
            $table->string('sec_sch_attended');
            $table->string('guidiance_name');
            $table->string('guidiance_address');
            $table->string('guidiance_email');
            $table->string('guidiance_phone');
            $table->foreignId('department_id')->constrained();
            $table->foreignId('course_duration_id')->constrained();
            $table->foreignId('sex_id')->constrained();
            $table->foreignId('marital_status_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('lga_id')->constrained();
            $table->foreignId('edu_qualification_id')->constrained();
            $table->foreignId('employment_status_id')->constrained();
            $table->integer('is_computer_knowledgeable')->default(0);
            $table->integer('is_certificate_needed')->default(1);
            $table->integer('is_approved')->default(0);
            $table->integer('is_duration_over')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();
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
