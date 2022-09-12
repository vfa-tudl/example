<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string', 
            'Company' => 'required|string',
            'salary' => 'required|string',
            'location' => 'required|string',
            'work_hour' => 'required|string',
            'description' => 'required|string',
            'probation'=> 'required|string',
            'display_status'=> 'required|string',
            'Image'=>'required|string',
        ];
    }
}
