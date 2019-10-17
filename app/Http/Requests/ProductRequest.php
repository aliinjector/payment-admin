<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {
      // dd($request);
      if ($request->type == 'product') {
        return [
            'title' => 'required',
            'product_category' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'image' => 'required',
        ];
      }
else if($request->type == 'file'){
  return [
    'title' => 'required',
    'product_category' => 'required',
    'image' => 'required',
    'amount' => 'required',
    'price' => 'required',
    'file_size' => 'required',
    'attachment' => 'required',
  ];
}
else{
  return [
    'title' => 'required',
    'product_category' => 'required',
    'image' => 'required',
    'price' => 'required',
  ];
}

    }
}
