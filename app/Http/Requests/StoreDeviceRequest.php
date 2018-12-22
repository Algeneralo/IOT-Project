<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceRequest extends FormRequest
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
            "fname"=>"required",
            "ssid"=>"required",
            "wifiPassword"=>"required",
            "device_id"=>"required",
//            "type"=>"required",
//            "mac_address"=>"required",
        ];
    }
    public function messages()
    {
        return [
            'fname.required' => 'A memorable name is required',
            'ssid.required' => 'Wifi Network is required',
            'wifiPassword.required' => 'Wifi Password is required',
        ];
    }
}
