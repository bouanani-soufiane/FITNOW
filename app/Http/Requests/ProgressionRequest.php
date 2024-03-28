<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgressionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'poids' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'chest_Measurement' => 'required',
            'biceps_Measurement' => 'required',
            'waist_Measurement' => 'required',
            'hip_Measurement' => 'required',
            'squat' => 'required',
            'deadlift' => 'required',
            'pushUp' => 'required',
            'status' => 'required',
            'date' => 'required',
            'user_id' => ''
        ];
    }
}
