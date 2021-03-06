<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserEditRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'address' => 'string|max:255|nullable',
            'phone' => 'string|max:255',
            'bio' => 'string|max:255',
            'userTags' => 'string|max:255',
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
            if (
                $this->request->get('email')
                !=
                User::where('id',$this->id)->get()->first()->email
            )
            {
                $validator->errors()->add('email','This email has already been used !');
            }
        });
    }
}
