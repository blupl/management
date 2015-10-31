<?php namespace Blupl\Management\Http\Requests;

use App\Http\Requests\Request;

class ManagementRequest extends Request {

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
            'name' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'department' => 'required',
            'organization' => 'required',
            'mobile' => 'required',
            'personal_id' => 'required',
            'email' => 'required|email',
            'present_address1' => 'required',
            'present_address2' => '',
            'present_district' => 'required',
            'present_zip' => 'required',
            'permanent_address1' => 'required',
            'permanent_address2' => '',
            'permanent_district' => 'required',
            'permanent_zip' => 'required',
            'workstation' => 'required',
            'card_collection_point' => 'required',
            'file1' => 'required',
            'file2' => 'required',
		];
	}

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'role.required' => 'A Designation / Role / Activity  is required',
            'mobile.required'  => 'A contact phone number is required',
            'personal_id.required' => 'A national id is required',
            'email.required' => 'A email is required',
            'present_address1.required' => 'A present address line 1 is required',
            'present_district.required' => 'A present address district is required',
            'present_zip.required' => 'A present address zip is required',
            'permanent_address1.required' => 'A permanent address line 1 is required',
            'permanent_district.required' => 'A permanent address district is required',
            'permanent_zip.required' => 'A permanent address zip is required',
            'file1.required' => 'A photo is required',
            'file2.required' => 'A attached file is required',
        ];
    }
}

