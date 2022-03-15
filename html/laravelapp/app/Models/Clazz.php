<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Clazz extends ModelBase
{
  use SoftDeletes;

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
