<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenjualanRequest extends FormRequest
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
            'tanggal'      => ['required', 'date'],
            'total'        => ['required', 'int'],
            'produk_id'    => ['required', 'int'],
            'pelanggan_id' => ['required', 'int'],
        ];
    }
}
