<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'expected_salary' => 'required|numeric|min:1|max:100000000',
      'cv' => 'required|file|mimes:pdf|max:2048',
    ];
  }
}
