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
<<<<<<< HEAD

    $request->user()->employer()->create($request->validated());

=======
    $request->user()->employer()->create(
      $request->validated([
        'company_name' => 'required|min:3|unique:employers,company_name'
      ])
    );
>>>>>>> 765dc99c73c446b3b1b8a36b8b838cbe96d79c01
    return redirect()->route('jobs.index')
      ->with('success', 'あなたの会社のアカウントが作成されました！');
  }
}
