<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  use HasFactory;

  protected $table = 'offered_jobs'; // テーブル名を明示的に指定

  public static array $experience = ['エントリー', '中堅', 'シニア'];
  public static array $category = [
    'IT',
    '金融',
    '営業',
    'マーケティング',
    '人事'
  ];
}
