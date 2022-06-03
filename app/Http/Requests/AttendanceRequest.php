<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
            'address' => 'required|string',
            'type' => 'required|in:in,out',
            'photo' => 'required',
        ];
    }
}
