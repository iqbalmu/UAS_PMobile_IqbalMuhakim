<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nik" => "required|min:16|max:16|unique:pasiens,nik",
            "bpjs" => "nullable|min:13|max:13|unique:pasiens,bpjs",
            "jenis_kelamin" => "required",
            "profesi" => "required",
            "alamat" => "required",
            "image_profile" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            'errors' => $validator->getMessageBag()
        ], 400));
    }
}
