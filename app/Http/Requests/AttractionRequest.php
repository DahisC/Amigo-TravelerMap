<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttractionRequest extends FormRequest
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
             //詳細內容
        'name'   => 'required|max:50|min:3',
        'website'=> ['nullable','string','url'],//'regex:/^https*:/'
        'tel'    => 'nullable|string',
        'description ' => 'max:500',
        'ticket_info'  => 'nullable|string|max:300',
        'traffic_info' => 'nullable|string|max:300',
        'parking_info' => 'nullable|string|max:300',

        //上傳照片
        'country' => 'required|string',
        'region'  => 'required|string',
        'town'    => 'required|string',
        'address' => 'required|string',
        'url'     => 'required|image|file|size:1024',
        'image_desc'  => 'nullable|string|max:300',
        ];
    }
}
