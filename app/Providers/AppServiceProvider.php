<?php

namespace App\Providers;

use App\Models\Job;
use App\Policies\JobPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    // ポリシーを登録
    $this->registerPolicies();

    // Jobモデルに対するポリシーを登録
    \Illuminate\Support\Facades\Gate::policy(Job::class, JobPolicy::class);
  }

  /**
   * Register the application's policies.
   */
  public function registerPolicies(): void
  {
    \Illuminate\Support\Facades\Gate::guessPolicyNamesUsing(function ($modelClass) {
      return 'App\\Policies\\' . class_basename($modelClass) . 'Policy';
    });
  }
}
