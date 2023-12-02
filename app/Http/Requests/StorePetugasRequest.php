<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetugasRequest extends FormRequest
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
               'nama' => 'required|min:10',
               'alamat' => 'required|min:10|max:100',
               'jenis_kelamin' => 'required|min:8',
               'no_tlp' => 'required|min:11',
               'img' => 'nullable',
               'id_user'=>'nullable'
        ];
    }
}
