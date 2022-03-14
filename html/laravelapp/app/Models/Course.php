<?php

namespace App\Models;

class Course extends ModelBase
{
  protected $fillable = [
    'name',
  ];

  public function clazzes()
  {
    return $this->belongsToMany(Clazz::class);
  }
}
