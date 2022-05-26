<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama'      => ['required', 'string', 'min:3', 'max:100'],
            'deskripsi' => ['required', 'string', 'min:3'],
            'harga'     => ['required', 'int'],
            'gambar_id' => ['sometimes', 'int'],
        ];
    }
}
