<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'email|unique',
            'phone' => 'nullable|string|max:20',
            'birthdate' => 'required|date',
            'card_id' => 'required|string|size:8',
            'password' => ['required','string','confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ];
    }
}
