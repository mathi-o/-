<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'date'=>['required','date'],
            'location'=>['required','string','max:255'],
            'title'=>['required','string','max:255'],
            'photo'=>['required','image','file','max:4096'],
            'impression'=>['nullable','string'],
            'latitude'=>['required','numeric'],
            'longitude'=>['required','numeric']
        ];
    }
}
