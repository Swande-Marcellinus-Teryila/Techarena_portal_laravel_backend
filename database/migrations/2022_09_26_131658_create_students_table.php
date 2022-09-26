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
            $table->string('residential_address');
            $table->string('is_computer_knowledgeable');
            $table->string('is_certificate_needed');
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
