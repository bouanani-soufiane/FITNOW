<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgressionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
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
            'date' => 'required',

        ];
    }
}
