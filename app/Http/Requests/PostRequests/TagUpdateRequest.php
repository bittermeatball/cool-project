<?php

namespace App\Http\Requests\PostRequests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tag;

class TagUpdateRequest extends FormRequest
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
            'tag_name' => 'required|string|max:255',
            'keywords' => 'string|max:300|nullable',
            'description' => 'string|max:300|nullable',
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
            if (
                slug($this->request->get('tag_name'))
                !=
                slug(Tag::where('id',$this->tag->id)->get()->first()->tag_name)
            )
            {
                $validator->errors()->add('tag_name','URL form tag has already exist');
            }
        });
    }

}
