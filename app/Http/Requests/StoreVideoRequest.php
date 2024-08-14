<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'video' => 'required|file|mimes:mpeg,mp4,webm,3gp,mov,avi,wmv,ts|max:100040', // max size ~100MB
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'video.required' => 'A video file is required.',
            'video.mimes' => 'The video must be a file of type: mpeg, mp4, webm, 3gp, mov, avi, wmv, ts.',
            'video.max' => 'The video size must not exceed 100MB.',
        ];
    }
}
