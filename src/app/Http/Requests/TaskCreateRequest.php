<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use TaskPriority;

class TaskCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:20',
            'is_completed' => 'required|boolean',
            // 'priority' => ['required', new Enum(TaskPriority::class)],
            'priority' => 'required|in:high,medium,low',
            'deadline' => 'nullable|date_format:Y-m-d H:i:s'
        ];
    }
}
