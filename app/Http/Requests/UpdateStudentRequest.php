<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'code' => 'required|unique:students,code,'.$this->student.'',
            'name' => 'required',
            'group' => 'required|unique:students,group,'.$this->student.'',
        ];
    }
    public function messages(): array
    {
        return [
            'code.required' => 'Mã sinh viên không được để trống',
            'code.unique' => 'Mã sinh viên đã tồn tại',
            'name.required' => 'Tên sinh viên không được để trống',
            'group.required' => 'Nhóm sinh viên không được để trống',
            'group.unique' => 'Nhóm sinh viên đã tồn tại',
        ];  
    }
}
