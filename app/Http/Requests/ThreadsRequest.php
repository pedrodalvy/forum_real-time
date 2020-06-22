<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'title' => 'required|string|min:10|max:255',
                    'body' => 'required|string|min:20',
                ];
            }
            default:
            {
                return [
                    'title' => 'string|min:10|max:255',
                    'body' => 'string|min:20',
                ];
            }
        }

    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'body' => 'conteúdo',
        ];
    }
}
