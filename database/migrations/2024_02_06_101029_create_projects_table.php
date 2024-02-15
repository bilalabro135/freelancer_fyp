<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text("job_title")->default('(untitled-job)');
            $table->integer("delivery_time")->nullable();
            $table->string("location")->nullable();
            $table->text("description")->nullable();
            $table->integer("payment_method")->nullable();
            $table->string("price")->nullable();
            $table->integer("role_id")->nullable();
            $table->string("job_category")->nullable();
            $table->integer("user_id")->nullable();
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('projects');
    }
}
