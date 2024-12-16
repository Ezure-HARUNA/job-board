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
<<<<<<< HEAD

    $validatedData = $request->validated();

=======
    // 入力された希望年収をバリデーション
    $validatedData = $request->validated([
      'expected_salary' => 'required|min:1|max:100000000',
      'cv' => 'required|file|mimes:pdf|max:2048'
    ]);
>>>>>>> 765dc99c73c446b3b1b8a36b8b838cbe96d79c01
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
