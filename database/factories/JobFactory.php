<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use App\Models\Job;
use Illuminate\Support\Facades\Schema;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $faker = FakerFactory::create('ja_JP');
    return [
      'title' => $faker->realText(20),
      'description' => $faker->realText(200),
      'salary' => $faker->numberBetween(5_000, 150_000),
      'location' => $faker->city,
      'category' => $faker->randomElement(Job::$category),
      'experience' => $faker->randomElement(Job::$experience),
    ];
  }
  // public function down()
  // {
  //   Schema::dropIfExists('offered_jobs');
  // }
}
