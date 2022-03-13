<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('classes', function (Blueprint $table) {
      $table->id();
      $table->string('name'); // 2022年1期生
      $table->string('year'); // 2022
      $table->string('season'); // 1, 2, ..., 6
      $table->string('type'); // FT(フルタイム) or PT(パートタイム)
      $table->dateTime('created_at');
      $table->dateTime('updated_at');
      $table->dateTime('deleted_at')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('classes');
  }
}
