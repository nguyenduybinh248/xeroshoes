<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            //
	        'email'=>'required|email',
	        'name'=>'required',
	        'address'=>'required',
	        'phone'=>'required|numeric',
        ];
    }
	public function messages()
	{
		return [
			'email.required'=>"please add email",
			'name.required'=>"please add name",
			'address.required'=>"please add address",
			'phone.required'=>"please add phone",
			'phone.numeric'=>"please add phone as number",
		];
	}
}
