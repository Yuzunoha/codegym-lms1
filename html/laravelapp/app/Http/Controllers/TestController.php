<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
  protected TestService $testService;

  public function __construct(TestService $testService)
  {
    $this->testService = $testService;
  }

  public function index()
  {
    return $this->testService->index();
  }

  public function relation()
  {
    $data = Course::create([
      'name' => 'コース1',
    ]);

    return view('test', compact('data'));
  }
}
