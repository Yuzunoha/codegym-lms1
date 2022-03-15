<?php

namespace Database\Seeders;

use App\Models\Clazz;
use App\Models\ClazzCourse;
use App\Models\Course;
use createClazzCourseTable;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $languages = ['PHP', 'Java', 'JavaScript', 'HTML', 'Python'];

    /**
     * コース
     */
    foreach ($languages as $language) {
      Course::create([
        'name' => $language . '基礎コース',
      ]);
    }

    /**
     * クラス
     */
    for ($i = 1; $i <= 5; $i++) {
      $str = '2022年' . $i . '期生';
      Clazz::create([
        'name' => $str . 'FT',
        'year' => '2022',
        'season' => $i,
        'type' => 'FT',
      ]);
      Clazz::create([
        'name' => $str . 'PT',
        'year' => '2022',
        'season' => $i,
        'type' => 'PT',
      ]);
    }
    for ($i = 1; $i <= 5; $i++) {
      $str = '2023年' . $i . '期生';
      Clazz::create([
        'name' => $str . 'FT',
        'year' => '2023',
        'season' => $i,
        'type' => 'FT',
      ]);
      Clazz::create([
        'name' => $str . 'PT',
        'year' => '2023',
        'season' => $i,
        'type' => 'PT',
      ]);
    }

    /**
     * コース_クラス
     */
    $courses = Course::all()->toArray();
    $clazzes = Clazz::all()->toArray();
    foreach ($courses as $course) {
      $course_id = $course['id'];
      foreach ($clazzes as $clazz) {
        $clazz_id = $clazz['id'];
        ClazzCourse::create([
          'course_id' => $course_id,
          'clazz_id' => $clazz_id,
        ]);
      }
    }
  }
}
