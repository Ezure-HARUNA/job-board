<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  // public function definition(): array
  // {
  //   $faker = FakerFactory::create('ja_JP');
  //   return [
  //     'company_name' => fake()->company
  //   ];
  // }

  public function definition(): array
  {
    $prefixes = ['中央', '日本', '国際', '東洋', '第一', '東京', '新日本', '日本橋'];
    $suffixes = ['商事', '工業', '電機', 'システム', 'インターナショナル', '技研', '通信', '開発'];

    $prefix = $prefixes[array_rand($prefixes)];
    $suffix = $suffixes[array_rand($suffixes)];
    $companyName = $prefix . $suffix . '株式会社';

    return [
      'company_name' => $companyName
    ];
  }
}
