<?php

namespace App\Http\Controllers;

use App\Models\Clazz;
use App\Models\Course;
use Illuminate\Http\Request;

class ClazzController extends Controller
{
  public function index()
  {
    $clazzes = Clazz::get();
    return view('clazzes/index', compact('clazzes'));
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
    $clazz = Clazz::find($id);
    if (!$clazz) {
      /* 無い */
      return redirect('classes');
    }
    return view('clazzes/edit', compact('clazz'));
  }

  public function update(Request $request, int $id)
  {
    $clazz = Clazz::find($id);
    if (!$clazz) {
      /* 無い */
      return redirect('classes');
    }
    $clazz->name = $request->name ?: $clazz->name;
    $clazz->save();
    return redirect("classes/$id/edit");
  }

  public function destroy($id)
  {
    $clazz = Clazz::find($id);
    if ($clazz) {
      /* ある */
      $clazz->delete();
    }
    return redirect('classes');
  }
}
