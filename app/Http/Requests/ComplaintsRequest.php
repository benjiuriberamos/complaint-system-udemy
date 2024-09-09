<?php

namespace App\Http\Requests;

use App\Models\Complaints;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ComplaintsRequest extends FormRequest
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
            'owner_name' => 'required|max:255',
            'email' => 'required|max:255',
            'context' => 'required|max:5000',
            'priority' => [
                'required',
                Rule::in(Complaints::PRIORITY_TYPES),
            ],
            'category' => [
                'required',
                Rule::in(Complaints::CATEGORY_TYPES),
            ],
            'id_user' => 'exists:App\Models\User,id',
        ];
    }
}
