<?php

namespace App\Http\Controllers;

use App\Models\Clazz;
use App\Models\ClazzCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class ClazzCourseController extends Controller
{
  public function getClazzCourse(int $clazz_id, int $course_id): ?ClazzCourse
  {
    return ClazzCourse::where('clazz_id', $clazz_id)
      ->where('course_id', $course_id)
      ->first();
  }

  public function store(Request $request)
  {
    $clazz_id = $request->clazz_id;
    $course_id = $request->course_id;

    $fnRedirect = fn () => redirect("courses/$course_id/edit");
    if (!Clazz::find($clazz_id)) {
      /* クラスが存在しない */
      return $fnRedirect();
    }

    if (!Course::find($course_id)) {
      /* コースが存在しない */
      return $fnRedirect();
    }

    if ($this->getClazzCourse($clazz_id, $course_id)) {
      /* リレーションが既に存在する */
      return $fnRedirect();
    }

    /* リレーションを作成する */
    ClazzCourse::create([
      'course_id' => $course_id,
      'clazz_id' => $clazz_id,
    ]);
    return $fnRedirect();
  }

  public function destroy(Request $request)
  {
    $m = $this->getClazzCourse($request->clazz_id, $request->course_id);
    if ($m) {
      $m->delete();
    }
    return redirect("courses/$request->course_id/edit");
  }
}
