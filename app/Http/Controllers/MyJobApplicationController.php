<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    return view(
      'my_job_application.index',
      [
        'applications' => $request->user()->jobApplications()
          ->with('job', 'job.employer')
          ->latest()->get()
      ]
    );
  }

  public function destroy(string $id)
  {
    //
  }
}
