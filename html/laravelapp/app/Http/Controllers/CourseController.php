<?php

namespace App\Http\Controllers;

use App\Models\Clazz;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $courses = Course::with('clazzes')->get();
    return view('courses/index', compact('courses'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id)
  {
    $course = Course::with('clazzes')->find($id);
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

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $course = Course::find($id);
    if (!$course) {
      /* 無い */
      return redirect('courses');
    }
    $course->name = $request->name ?: $course->name;
    $course->save();
    return view('courses/edit', compact('course'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
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
