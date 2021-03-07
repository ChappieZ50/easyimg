<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
        $captcha = config()->get('captcha.secret') && config()->get('captcha.sitekey');

        $rules = [
            'name'    => 'required|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'required|max:100',
            'message' => 'required|max:350',
        ];

        if ($captcha) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        return $rules;
    }
}
