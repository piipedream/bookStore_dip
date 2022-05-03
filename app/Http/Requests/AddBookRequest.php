<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
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
          'title' => 'required|min:5|max:100',
          'author' => 'required|min:5|max:100',
          'description' => 'required|min:15|max:5000',
          'genre' => 'required|min:5|max:50',
          'country' => 'required|min:3|max:50',
          'pages' => 'required',
          'price' => 'required',
          'image' => 'mimes:png,jpg,jpeg,bmp|max:10240'
        ];
    }
}
