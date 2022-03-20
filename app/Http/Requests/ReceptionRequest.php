<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class ReceptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'object_uuid' => 'regex:/^[a-zA-Z0-9_\-]*$/|required',
            'card_uuid'   => 'regex:/^[a-zA-Z0-9_\-]*$/|required'
        ];
    }

    /**
     * Return custom message.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'object_uuid.required' => 'ID objekta je obavezno polje!',
            'card_uuid.required' => 'ID kartice je obavezno polje!'
        ];
    }

    /**
     * Check validation is ok.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true
        ], 422));
    }
}
