<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
  protected $testService;

  public function __construct(TestService $testService)
  {
    $this->testService = $testService;
  }

  public function index()
  {
    return $this->testService->index();
  }
}
