<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:3|max:5000',
            'scope' => 'required|min:3|max:50',
            'attachment' => 'nullable|mimes:jpeg,bmp,png,docx,pdf',
        ];
    }
}
