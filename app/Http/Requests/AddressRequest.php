<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if(\auth::user()){
        return true;
      }
      else{
        return false;
      }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'city' => 'required|min:1|max:20|regex:/^[\pL\s\-]+$/u',
          'province' => 'required|min:1|max:20|regex:/^[\pL\s\-]+$/u',
            'zip_code' => 'required|digits:10',
            'address' => 'required|min:1|max:220',
        ];
    }
}
