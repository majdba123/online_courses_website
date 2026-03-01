<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discription' => 'required|string|max:65535',
            'time_of_course' => 'required|string|max:255',
            'doctor_id' => 'nullable|exists:doctors,id',
            'discount_id' => 'nullable|exists:discounts,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'discription' => 'الوصف',
            'time_of_course' => 'مدة الدورة',
            'doctor_id' => 'الدكتور',
            'discount_id' => 'الخصم',
        ];
    }
}
