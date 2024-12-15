<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerRequest;
use App\Models\Employer;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
  public function __construct()
  {
    Gate::authorize('create', Employer::class);
  }

  public function create()
  {
    return view('employer.create');
  }

  public function store(EmployerRequest $request)
  {
    Gate::authorize('create', Employer::class);

    $request->user()->employer()->create($request->validated());

    return redirect()->route('jobs.index')
      ->with('success', 'あなたの会社のアカウントが作成されました！');
  }
}
