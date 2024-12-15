<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\JobRequest;
use App\Http\Requests\JobApplicationRequest;

class JobApplicationController extends Controller
{
  use AuthorizesRequests;

  public function create(Job $job)
  {
    Gate::authorize('apply', $job);
    return view('job_application.create', ['job' => $job]);
  }



  public function store(JobApplicationRequest $request, Job $job)
  {
    Gate::authorize('apply', $job);

    $validatedData = $request->validated();

    $file = $request->file('cv');
    $path = $file->store('cvs', 'private');

    // 万円単位の希望年収を円単位に変換
    $expectedSalaryInYen = $validatedData['expected_salary'] * 10000;

    // ジョブアプリケーションを作成
    $job->jobApplications()->create([
      'user_id' => $request->user()->id,
      'expected_salary' => $expectedSalaryInYen,
      'cv_path' => $path,
    ]);

    return redirect()->route('jobs.show', $job)
      ->with('success', '応募が成功しました！');
  }


  public function destroy(string $id)
  {
    //
  }
}
