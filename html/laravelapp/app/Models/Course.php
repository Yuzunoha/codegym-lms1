<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends ModelBase
{
  use SoftDeletes;

  protected $fillable = [
    'name',
  ];

  public function clazzes()
  {
    return $this->belongsToMany(Clazz::class);
  }
}
