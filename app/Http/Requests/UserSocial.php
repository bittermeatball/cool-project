<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSocial extends FormRequest
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
            'facebook' => 'string|url|nullable',
            'twitter' => 'string|url|nullable',
            'github' => 'string|url|nullable',
            'instagram' => 'string|url|nullable',
            'snapchat' => 'string|url|nullable',
            'googlePlus' => 'string|url|nullable',        ];
    }
}
