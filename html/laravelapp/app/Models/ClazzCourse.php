<?php

namespace App\Models;

class ClazzCourse extends ModelBase
{
  protected $table = 'clazz_course';

  protected $fillable = [
    'course_id',
    'clazz_id',
  ];
}
