<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
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
            'isbn' => 'required|min:2',
            'judul' => 'required|min:2',
            'pengarang' => 'required|min:2',
            'penerbit' => 'required|min:2',
            'tahun' => 'required|min:2',
            'jumlah' => 'required|min:2',
            'kategori' => 'required|min:2',
            'tipe' => 'required|min:2',
//            'img' => 'required|min:1',
            'deskripsi' => 'required|min:1',


        ];
    }
}
