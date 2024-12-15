<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    // return view('my-jobs.index');
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
    return view('my-jobs.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Gate::authorize('create', Job::class);

    $validatedData = $request->validate([
      'title' => 'required|string|max:255',
      'location' => 'required|string|max:255',
      'salary' => 'required|numeric|min:300',
      'description' => 'required|string',
      'experience' => 'required|in:' . implode(',', Job::$experience),
      'category' => 'required|in:' . implode(',', Job::$category)
    ]);

    $expectedSalaryInYen = $validatedData['salary'] * 10000;

    $jobData = array_merge($validatedData, ['salary' => $expectedSalaryInYen]);

    $request->user()->employer->jobs()->create($jobData);

    return redirect()->route('my-jobs.index')
      ->with('success', '求人の作成に成功しました！');
  }



  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
