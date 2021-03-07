<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() ? false : true;
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
            'email'    => 'required|email',
            'password' => 'required',
        ];

        if ($captcha) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        return $rules;
    }
}
