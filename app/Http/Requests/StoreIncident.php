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
            'submitted_by' => 'sometimes|required|max:255',
            'witnessed_by' => 'max:255',
            'location' => 'sometimes|required|max:255',
            'description' => 'sometimes|required',
            'leo' => 'boolean',
            'occurred_at' => 'sometimes|required_without_all:date,time|date',
            'people' => 'required|exists:people,id',
            'types' => 'required|exists:types,id'
        ];
    }

    protected function prepareForValidation()
    {
        if (isset($this->date, $this->time)) {
            $this->merge([
                'occurred_at' => date('Y-m-d H:i:s', strtotime($this->date . ' ' . $this->time)),
            ]);
        }
    }
}
