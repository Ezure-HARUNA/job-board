<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
  use HasFactory;
  protected $fillable = ['company_name'];

  public function jobs(): HasMany
  {
    //雇用主は求人を複数持つため、1対多のリレーション
    return $this->hasMany(Job::class);
  }

  public function user(): BelongsTo
  {
    //雇用主はユーザーを1人持つため、1対1のリレーション
    return $this->belongsTo(User::class);
  }
}
