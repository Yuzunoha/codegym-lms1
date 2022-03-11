<?php

namespace App\Services;

class TestService
{
  public function index(): string
  {
    return 'TestService->index()です。戻り値型指定しました。プロパティの型宣言もしました。';
  }
}
