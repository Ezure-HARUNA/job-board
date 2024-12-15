<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
  public function store(Request $request)
  {
    Gate::authorize('create', Employer::class);
    $request->user()->employer()->create(
      $request->validated([
        'company_name' => 'required|min:3|unique:employers,company_name'
      ])
    );
    return redirect()->route('jobs.index')
      ->with('success', 'あなたの会社のアカウントが作成されました！');
  }
}
