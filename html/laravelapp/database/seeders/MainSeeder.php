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
      break;
      Course::create([
        'name' => $language . '基礎コース',
      ]);
    }

    /**
     * クラス
     */
    foreach ($languages as $language) {
      break;
      for ($i = 1; $i <= 5; $i++) {
        $str = $language . 'クラス' . $i;
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
    }

    /**
     * コース_クラス
     */
    $courses = Course::all()->toArray();
    $clazzes = Clazz::all()->toArray();
    foreach ($courses as $course) {
      break;
      $course_id = $course['id'];
      $lang = explode('基礎', $course['name'])[0];
      foreach ($clazzes as $clazz) {
        if (strpos($clazz['name'], $lang . 'クラス') !== false) {
          $clazz_id = $clazz['id'];
          ClazzCourse::create([
            'course_id' => $course_id,
            'clazz_id' => $clazz_id,
          ]);
        }
      }
    }
  }
}
