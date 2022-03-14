<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createClazzCourseTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clazz_course', function (Blueprint $table) {
      $table->id();
      $table->integer('course_id');
      $table->string('clazz_id');
      $table->dateTime('created_at');
      $table->dateTime('updated_at');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('clazz_course');
  }
}
