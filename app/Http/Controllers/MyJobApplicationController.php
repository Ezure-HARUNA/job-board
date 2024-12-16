<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class MyJobApplicationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    return view(
      'my-job-applications.index',
      [
        'applications' => $request->user()->jobApplications()
          ->with([
            'job' => fn($query) => $query->withCount('jobApplications')
              ->withAvg('jobApplications', 'expected_salary')
              // ソフトデリートで消したデータも表示するよって意味
              ->withTrashed(),
            'job.employer'
          ])
          ->latest()->get()
      ]
    );
  }

  public function destroy(JobApplication $myJobApplication)
  {
    $myJobApplication->delete();
    return redirect()->back()->with(
      '成功',
      '応募をキャンセルしました'
    );
  }
}
