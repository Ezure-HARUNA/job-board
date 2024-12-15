<?php

namespace App\Providers;

use App\Models\Job;
use App\Policies\JobPolicy;
use Illuminate\Support\Facades\Route;
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
  // app/Providers/AppServiceProvider.php
  public function boot(): void
  {
    $this->registerPolicies();
    \Illuminate\Support\Facades\Gate::policy(Job::class, \App\Policies\JobPolicy::class);
    Route::model('job', Job::class); // 修正ポイント
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
