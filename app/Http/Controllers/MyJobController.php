<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\JobRequest;

class MyJobController extends Controller
{
  // public function index(Request $request)
  // {
  //   dd($request);
  //   Gate::authorize('viewAnyEmployer', Job::class);
  //   return view('my-jobs.index', [
  //     'jobs' => $request->user()->employer
  //       ->jobs()
  //       ->with(['employer', 'jobApplications', 'jobApplications.user'])
  //       ->get()
  //   ]);
  // }
  public function index(Request $request)
  {
    Gate::authorize('viewAnyEmployer', Job::class);

    $jobs = $request->user()->employer
      ->jobs()
      ->with(['employer', 'jobApplications', 'jobApplications.user'])
      ->get();

    return view('my-jobs.index', [
      'jobs' => $jobs
    ]);
  }


  public function show(Job $job) {}

  public function create()
  {
    Gate::authorize('create', Job::class);
    return view('my-jobs.create');
  }

  public function store(JobRequest $request)
  {
    Gate::authorize('create', Job::class);

    $validatedData = $request->validated();

    $expectedSalaryInYen = $validatedData['salary'] * 10000;

    $jobData = array_merge($validatedData, ['salary' => $expectedSalaryInYen]);

    $request->user()->employer->jobs()->create($jobData);

    return redirect()->route('my-jobs.index')
      ->with('success', '求人の作成に成功しました！');
  }

  public function edit($id)
  {
    $job = Job::find($id); // IDを使用してジョブを検索

    if (!$job) {
      return redirect()->route('my-jobs.index')->with('error', '求人情報が見つかりませんでした。');
    }

    Gate::authorize('update', $job);
    return view('my-jobs.edit', compact('job'));
  }


  public function update(JobRequest $request, $id)
  {
    $job = Job::find($id);

    if (!$job) {
      return redirect()->route('my-jobs.index')->with('error', '求人情報が見つかりませんでした。');
    }

    if (!Gate::allows('update', $job)) {
      $errorMessage = 'この求人情報を編集する権限がありません。';
      if ($job->jobApplications()->count() > 0) {
        $errorMessage = '応募がある場合、求人情報を変更できません。';
      }
      return redirect()->route('my-jobs.index')->with('error', $errorMessage);
    }

    $validatedData = $request->validated();
    $expectedSalaryInYen = $validatedData['salary'] * 10000;
    $job->update(array_merge($validatedData, ['salary' => $expectedSalaryInYen]));

    return redirect()->route('my-jobs.index')->with('success', '求人の更新に成功しました！');
  }


  public function destroy(Job $job, $id)
  {
    $job = Job::find($id);
    if (!$job) {
      return redirect()->route('my-jobs.index')->with('error', '求人情報が見つかりませんでした。');
    }

    Gate::authorize('delete', $job);

    $job->delete();
    return redirect()->route('my-jobs.index')
      ->with('success', '求人の削除に成功しました！');
  }
}
