<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\JobRequest;

class MyJobController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    // return view('my-jobs.index');
    Gate::authorize('viewAnyEmployer', Job::class);
    return view(
      'my-jobs.index',
      [
        'jobs' => $request->user()->employer
          ->jobs()
          ->with(['employer', 'jobApplications', 'jobApplications.user'])
          ->get()
      ]
    );
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    Gate::authorize('create', Job::class);
    return view('my-jobs.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(JobRequest $request)
  {
    Gate::authorize('store', Job::class);

    $validatedData = $request->validate();

    $expectedSalaryInYen = $validatedData['salary'] * 10000;

    $jobData = array_merge($validatedData, ['salary' => $expectedSalaryInYen]);

    $request->user()->employer->jobs()->create($jobData);

    return redirect()->route('my-jobs.index')
      ->with('success', '求人の作成に成功しました！');
  }


  public function edit(Job $job)
  {
    // 正しい引数を渡して認可を確認
    Gate::authorize('update', $job);

    return view('my-jobs.edit', compact('job'));
  }

  // public function update(JobRequest $request, Job $job)
  // {
  //   try {
  //     Gate::authorize('update', $job);

  //     $validatedData = $request->validated();
  //     $expectedSalaryInYen = $validatedData['salary'] * 10000;
  //     $job->update(array_merge($validatedData, ['salary' => $expectedSalaryInYen]));

  //     return redirect()->route('my-jobs.index')
  //       ->with('success', '求人の更新に成功しました！');
  //   } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
  //     return redirect()->route('my-jobs.index')
  //       ->with('error', 'この求人情報を編集する権限がありません。応募がある場合、求人情報を変更できません。');
  //   }
  // }

  public function update(JobRequest $request, Job $job)
  {
    if (!Gate::allows('update', $job)) {
      // 条件を満たさない場合、フラッシュメッセージを設定してリダイレクト
      $errorMessage = 'この求人情報を編集する権限がありません。';

      if ($job->jobApplications()->count() > 0) {
        $errorMessage = '応募がある場合、求人情報を変更できません。';
      }

      return redirect()->route('my-jobs.index')
        ->with('error', $errorMessage);
    }

    // 条件を満たす場合の処理
    $validatedData = $request->validated();
    $expectedSalaryInYen = $validatedData['salary'] * 10000;
    $job->update(array_merge($validatedData, ['salary' => $expectedSalaryInYen]));

    return redirect()->route('my-jobs.index')
      ->with('success', '求人の更新に成功しました！');
  }



  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Gate::authorize('delete', Job::class);
  }
}
