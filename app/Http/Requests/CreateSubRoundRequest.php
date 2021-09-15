<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubRoundRequest extends FormRequest
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
        $rules = [
            'subRounds' => 'required|array',
            'subRounds.*.start_date' => 'required|unique:sub_rounds,start_date,NULL,id,round_id,' . $this->round_id,
        ];

        return $rules;
    }
}
