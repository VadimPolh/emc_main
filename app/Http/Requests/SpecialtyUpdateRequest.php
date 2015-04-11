<?php namespace App\Http\Requests;

class SpecialtyUpdateRequest extends Request {
  
  /**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required',
			'chief' => 'required'
		];
	}
  
}