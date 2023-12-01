<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBukuRequest extends FormRequest
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
            'isbn' => 'required|min:10',
            'judul' => 'required|min:9',
            'pengarang' => 'required|min:5',
            'penerbit' => 'required|min:6',
            'tahun' => 'required|date',
            'jumlah' => 'required|numeric',
            'kategori' => 'required|min:5',
            'img' => 'nullable',
            'deskripsi' => 'required|min:1',
            'tipe' => 'required|min:4',
        ];
    }
}
