<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCartRequest extends FormRequest
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
	        'color'=>'required',
	        'size'=>'required',
	        'qty'=>'required|numeric|min:1',
        ];
    }
	public function messages()
	{
		return [
			'color.required'=>"please choose color",
			'size.required'=>"please choose size",
			'qty.required'=>"please choose quantity",
			'qty.min'=>"please choose quantity at least 1",
		];
	}
}
