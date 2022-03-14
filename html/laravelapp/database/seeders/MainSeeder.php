<?php

namespace Database\Seeders;

use App\Models\Clazz;
use App\Models\Course;
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
      for ($i = 1; $i <= 5; $i++) {
        $str = $language . 'クラス' . $i;
        Clazz::create([
          'name' => $str,
          'year' => '2022',
          'season' => $i,
          'type' => 'FT',
        ]);
        Clazz::create([
          'name' => $str,
          'year' => '2022',
          'season' => $i,
          'type' => 'PT',
        ]);
      }
    }
  }
}
