<?php

namespace App\Http\Controllers;

use App\Models\ClazzCourse;
use Illuminate\Http\Request;

class ClazzCourseController extends Controller
{
  public function store(Request $request)
  {
    dd($request);
  }

  public function destroy(Request $request)
  {
    $m = ClazzCourse::where('clazz_id', $request->clazz_id)
      ->where('course_id', $request->course_id)
      ->first();
    if ($m) {
      $m->delete();
    }
    return redirect("courses/$request->course_id/edit");
  }
}
