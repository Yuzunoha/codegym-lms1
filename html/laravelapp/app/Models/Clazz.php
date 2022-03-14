<?php

namespace App\Models;

class Clazz extends ModelBase
{
  protected $table = 'clazzes';

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
