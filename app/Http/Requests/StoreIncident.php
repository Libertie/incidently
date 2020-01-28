<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncident extends FormRequest
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
            'submitted_by' => 'required|max:255',
            'witnessed_by' => 'max:255',
            'location' => 'required|max:255',
            'description' => 'required',
            'occurred_at' => 'required|date'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'occurred_at' => date('Y-m-d H:i:s', strtotime($this->date.' '.$this->time)),
        ]);
    }
}
