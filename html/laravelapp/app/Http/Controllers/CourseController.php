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
    $data = Course::get()->toArray();
    return view('courses', compact('data'));
  }
}