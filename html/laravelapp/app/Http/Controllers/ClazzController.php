<?php

namespace App\Http\Controllers;

use App\Models\Clazz;
use App\Models\Course;
use Illuminate\Http\Request;

class ClazzController extends Controller
{
  public function index()
  {
    $courses = Course::with(['clazzes' => $this->fnOrderById()])->get();
    return view('courses/index', compact('courses'));
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    //
  }

  public function show($id)
  {
    //
  }

  public function edit(int $id)
  {
    $course = Course::with(['clazzes' => $this->fnOrderById()])->find($id);
    if (!$course) {
      /* 無い */
      return redirect('courses');
    }

    /* 包含していないclazzesを取得する */
    $relatedClazzIdList = [];
    foreach ($course->clazzes as $clazz) {
      $relatedClazzIdList[] = $clazz->id;
    }
    $unrelatedClazzes = Clazz::whereNotIn('id', $relatedClazzIdList)->get();

    return view('courses/edit', compact('course', 'unrelatedClazzes'));
  }

  public function update(Request $request, int $id)
  {
    $course = Course::find($id);
    if (!$course) {
      /* 無い */
      return redirect('courses');
    }
    $course->name = $request->name ?: $course->name;
    $course->save();
    return redirect("courses/$id/edit");
  }

  public function destroy($id)
  {
    $course = Course::find($id);
    if ($course) {
      /* ある */
      $course->delete();
    }
    return redirect('courses');
  }
}
