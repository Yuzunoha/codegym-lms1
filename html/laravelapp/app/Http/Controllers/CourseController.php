<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;

class CourseController extends Controller
{
  protected CourseService $courseService;

  public function __construct(CourseService $courseService)
  {
    $this->courseService = $courseService;
  }

  public function index()
  {
    $data = Course::with('clazzes')->get()->toArray();
    return view('courses', compact('data'));
  }

  public function edit(int $id)
  {
    return ['action' => 'edit', 'id' => $id];
  }
}
