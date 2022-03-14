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
    return view('courses/index', compact('data'));
  }

  public function edit(int $id)
  {
    $course = Course::with('clazzes')->find($id);
    if (!$course) {
      /* 存在しない */
      return redirect('courses');
    }
    return view('courses/edit', compact('course'));
  }

  public function update(int $id)
  {
    dd($id, '届いた');
  }
}
