<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactValidation extends FormRequest
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
            'username'=>'required|min:3|max:255',
            'useremail'=>'required|email:rfc,dns',
            'userphone'=>'required|min:3|max:15',
        ];
        
    }
    public function message(){
        
        return[

        'username'=>'The User Name is ',
        'useremail'=>'The Email User is',
        'userphone'=>'The Phone Number is',
        ]; 
    }
}
