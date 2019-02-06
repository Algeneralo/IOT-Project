<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFremantionProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "fahrenheit" => "required",
            "sname.*" => "required",
            "stemp.*" => "required",
            "stime.*" => "required|gt:0",
        ];
    }

    public function messages()
    {
        return [
            "sname.*.required" => "The stage name is required",
            "stime.*.required" => "The stage time is required",
            "stime.*.gt" => "The stage time must be greater than :value",
            "stemp.*.required" => "The stage temp is required",
        ];
    }
}
