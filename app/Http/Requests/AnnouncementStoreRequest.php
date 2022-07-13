<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementStoreRequest extends FormRequest
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
            'title' => 'required:max:200',
            'description' => 'max:1000',
            'image_urls.0.value' => 'required|url',
            'image_urls.*.value' => 'url',
            'price' => 'required|numeric|gt:0'
        ];
    }

//    public function messages()
//    {
//        return [
//            ''
//        ];
//    }
}
