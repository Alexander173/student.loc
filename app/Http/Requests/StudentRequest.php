<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        'first_name'=>'required|string|min:3|max:25',
        'middle_name'=>'required|string|min:3|max:25',
        'last_name'=>'required|string|min:3|max:25',
        'date_of_birthday'=>'required|date',
        'group_id'=>'required',           
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'Name is required!',
            'middle_name.required' => 'Middle Name is required!',
            'last_name.required' => 'Last Name is required!',
            'last_name.string' => 'Last Name is string!',
            'middle_name.string' => 'Middle Name is string!',
            'first_name.string' => 'First Name is string!',
            'date_of_birthday.required'=>'Date of birthday is required!',
            'group_id.required'=>'Group is required',
        ];
    }
}
