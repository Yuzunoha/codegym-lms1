<?php

namespace App\Models;

class Clazz extends ModelBase
{
  protected $fillable = [
    'name',
    'year',
    'season',
    'type',
  ];

  public function courses()
  {
    return $this->belongsToMany(Course::class);
  }
}
