<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{

  public function create(Job $job)
  {
    Gate::authorize('apply', $job);
    return view('job_application.create', ['job' => $job]);
  }

  public function store(Job $job, Request $request)
  {
    Gate::authorize('apply', $job);
    // 入力された希望年収をバリデーション
    $validatedData = $request->validate([
      'expected_salary' => 'required|numeric|min:1|max:100000000'
    ]);

    // 万円単位の希望年収を円単位に変換
    $expectedSalaryInYen = $validatedData['expected_salary'] * 10000;

    // ジョブアプリケーションを作成
    $job->jobApplications()->create([
      'user_id' => $request->user()->id,
      'expected_salary' => $expectedSalaryInYen, // 変換後の円単位の希望年収
    ]);

    return redirect()->route('jobs.show', $job)
      ->with('success', '応募が成功しました！');
  }


  public function destroy(string $id)
  {
    //
  }
}