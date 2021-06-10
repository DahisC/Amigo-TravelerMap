<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class CreateActivitiesRequest extends FormRequest
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
    // public function rules()
    // {

    //     return [
    //         //
    //     ];
    // }

    public function rules()
{
    return [
        //詳細內容
        'name'   => 'required|max:50|min:3',
        'website'=> 'nullable|string|active_url',
        'tel'    => 'nullable|string',
        'description ' => 'nullable|max:500', //pretend驗證欄位一定要有值，但可為空值。  !!應為required!!
        'ticket_info'  => 'nullable|string|max:300',
        'traffic_info' => 'nullable|string|max:300',
        'parking_info' => 'nullable|string|max:300',
        // 'email' => 'required|email|max:255|regex:/(.*)@myemail\.com/i|unique:users',

        //上傳照片
        'country' => 'required|string',
        'region'  => 'required|string',
        'town'    => 'required|string',
        'address' => 'required|string',
        'url'     => 'nullable|image|size:10240',  //驗證欄位檔案必須為圖片格式（ jpeg、png、bmp、gif、或 svg ）。  測試完改required
        'image_desc'  => 'nullable|string|max:300',
    ];
}
}
