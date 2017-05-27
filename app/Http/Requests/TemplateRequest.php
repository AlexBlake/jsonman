<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
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
        switch($this->method) {
            
            // Create
            case 'POST':
                return [
                    'title' =>  'required|max:100',
                    'description'   =>  'required',
                    'json'    =>  'required',
                ];
            break;

            // Update
            case 'PUT':
            case 'PATCH':
                return [
                    'title' =>  'required|max:100',
                    'description'   =>  'required',
                    'json'    =>  'required',
                ];
            break;

            // Others
            default:
                return [];
        };
    }
}
