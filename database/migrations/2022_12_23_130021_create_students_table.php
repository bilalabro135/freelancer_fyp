<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
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
            $table->string('name')->nullable();
            $table->boolean('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('admission_class')->nullable();
            $table->string('acdm_smstr')->nullable();
            $table->string('last_attend')->nullable();
            $table->date('date_leave')->nullable();
            $table->string('last_pass')->nullable();
            $table->string('transport')->nullable();
            $table->string('f_name')->nullable();
            $table->string('caste')->nullable();
            $table->string('occupation')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('cnic')->nullable();
            $table->string('phone_res')->nullable();
            $table->string('name_guardian')->nullable();
            $table->string('guardian_caste')->nullable();
            $table->string('rel_student')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_cnic')->nullable();
            $table->text('guardian_address')->nullable();
            $table->date('assesment_date')->nullable();
            $table->date('dob_student')->nullable();
            $table->string('age')->nullable();
            $table->string('student_fee')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('age_required')->nullable();
            $table->string('case_ref_class')->nullable();
            $table->string('forward_to')->nullable();
            $table->date('dated')->nullable();
            $table->string('student_pic')->nullable();
            $table->string('recent_photograph')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('leave_certificate')->nullable();
            $table->string('father_cnic')->nullable();
            $table->boolean('active')->default(1);
            $table->softDeletes();
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
}
