<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;


class UserPanelUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if(\auth::user()->is_superAdmin == 1){
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
      // dd(User::find(request()->user_id)->id);
      return [
        'firstName' => ['required', 'string', 'min:2', 'max:25'],
        'lastName' => ['required', 'string', 'min:2', 'max:25'],
        'email' => ['required', 'string', 'email', 'max:255', 'sometimes',Rule::unique('users')->ignore(User::find(request()->user_id)->id)],
        'mobile' => ['required', 'string','min:11' , 'max:11', Rule::unique('users')->ignore(User::find(request()->user_id)->id)],
        'status' => 'in:active,inActive',
        'info_status' => 'min:0|max:5',
      ];
    }
}
