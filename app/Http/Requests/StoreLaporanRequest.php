<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaporanRequest extends FormRequest
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
            'nama_pelapor' => ['required', 'string'],
            'alamat_pelapor' => ['nullable', 'string'],
            'no_hp_pelapor' => ['required', 'numeric'],

            'nama_terlapor' => ['required', 'string'],
            'jabatan_terlapor' => ['required', 'string'],
            'unit_terlapor' => ['required', 'string'],
            'pihak_terlibat' => ['nullable'],

            'kronologi' => ['required', 'string'],
            'waktu_pelanggaran' => ['required', 'date'],
            'tempat_pelanggaran' => ['required', 'string'],
            'konsekuensi' => ['required', 'string'],
            'jenis_pelanggaran' => ['nullable'],
        ];
    }
}
