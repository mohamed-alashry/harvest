<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Lead;

class UpdateLeadRequest extends FormRequest
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
        $rules = Lead::$rules;

        $rules['mobile_1'] = 'required|unique:leads,mobile_1,' . $this->segment(2);
        $rules['email'] = 'email|unique:leads,mobile_1,' . $this->segment(2);

        return $rules;
    }
}
