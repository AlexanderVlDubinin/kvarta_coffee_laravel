<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    /**
     * All users are allowed to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'mid_name' => ['prohibited'], // The field MUST be empty.

            // Validation of the Belarusian number: +375(XX)XXX-XX-XX
            'phone' => [
                'required',
                'string',
                // 'regex:/^(?:\+?375|8\s?0?)(?:\s?\(?\d{2}\)?\s?|\s?\d{2}\s?)\d{3}\s?-?\s?\d{2}\s?-?\s?\d{2}$/'
                'regex:/^\+375\((17|25|29|33|44)\)\d{3}-\d{2}-\d{2}$/'
            ],

            'interest' => ['required', 'string', 'in:order,subscription,question'],

            // A comment is required
            'comment' => ['required', 'string', 'max:2000'],

            // Accept marketing fields as nullable strings
            'utm_source'   => ['nullable', 'string', 'max:255'],
            'utm_medium'   => ['nullable', 'string', 'max:255'],
            'utm_campaign' => ['nullable', 'string', 'max:255'],
            'utm_content'  => ['nullable', 'string', 'max:255'],
            'referrer'     => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        // Determine which error to show depending on what the user has selected.
        $interest = $this->input('interest');

        $commentMessage = 'Пожалуйста, заполните текстовое поле.';
        if ($interest === 'question') {
            $commentMessage = 'Пожалуйста, напишите ваш вопрос, чтобы мы могли подготовить ответ.';
        } elseif ($interest === 'order' || $interest === 'subscription') {
            $commentMessage = 'Пожалуйста, укажите желаемый сорт кофе или выберите опции подписки.';
        }

        return [
            'name.required' => 'Пожалуйста, введите ваше имя.',
            'phone.required' => 'Номер телефона обязателен для связи.',
            'phone.regex' => 'Пожалуйста, введите корректный белорусский номер телефона в формате +375(XX)XXX-XX-XX.',
            'interest.required' => 'Выберите, что вас интересует.',
            //'comment.required_if' => 'Пожалуйста, укажите желаемый сорт кофе или выберите опции подписки.',
            'comment.required' => $commentMessage,
        ];
    }
}
