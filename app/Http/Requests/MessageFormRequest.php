<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'room_id' => ['required'],
            'message' => ['required', 'min:1'],
        ];
    }
}
