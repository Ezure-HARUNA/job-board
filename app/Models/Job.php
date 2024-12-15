<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Auth\Authenticatable;

class Job extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'location',
    'salary',
    'description',
    'experience',
    'category'
  ];

  protected $table = 'offered_jobs'; // テーブル名を明示的に指定

  public static array $experience = ['エントリー', '中堅', 'シニア'];
  public static array $category = [
    'エンジニア',
    '人事',
    'デザイナー',
    'マーケター',
    '営業',
    'アナリスト',
    'コンサル',
    'その他'
  ];

  public function employer(): BelongsTo
  {
    return $this->belongsTo(Employer::class);
  }

  // public function hasUserApplied(Authenticatable|User|int $user): bool
  // {
  //   return $this->where('id', $this->id)
  //     ->whereHas(
  //       'jobApplications',
  //       fn($query) => $query->where('user_id', '=', $user->id ?? $user)
  //     )->exists();
  // }

  public function hasUserApplied(Authenticatable|User|int $user): bool
  {
    $userId = $user instanceof User || $user instanceof Authenticatable ? $user->id : $user;
    return $this->jobApplications()
      ->where('user_id', $userId)
      ->exists();
  }


  public function jobApplications()
  {
    return $this->hasMany(JobApplication::class);
  }

  public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
  {
    return $query->when($filters['search'] ?? null, function ($query, $search) {
      $query->where(function ($query) use ($search) {
        $query
          ->where('title', 'like', '%' . $search . '%')
          ->orWhere('description', 'like', '%' . $search . '%')
          // ->orWhereHas('employer', function ($query) use ($search) {
          //   $query->where('company_name', 'like', '%' . $search . '%');
          // });
          ->orWhere('description', 'like', '%' . $search . '%')
          ->orWhereHas('employer', function ($query) use ($search) {
            $query->where('company_name', 'like', '%' . $search . '%');
          });
      });
    })->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
      $query->where('salary', '>=', $minSalary);
    })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
      $query->where('salary', '<=', $maxSalary);
    })->when($filters['experience'] ?? null, function ($query, $experience) {
      $query->where('experience', $experience);
    })->when($filters['category'] ?? null, function ($query, $category) {
      $query->where('category', $category);
    });
  }
}
