<?php

namespace App\Http\Requests;

use App\Enum\InterestType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

            'interest' => ['required', 'string', Rule::enum(InterestType::class)],

            // Validation of a hidden field with the composition of an order/subscription
            'product' => ['required_if:interest,order,subscription', 'nullable', 'string', 'max:2000'],

            // A comment is required ONLY for a text question.
            'comment' => ['required_if:interest,question', 'nullable', 'string', 'min:10', 'max:2000'],

            // Accept marketing fields as nullable strings
            'utm_source'   => ['nullable', 'string', 'max:255'],
            'utm_medium'   => ['nullable', 'string', 'max:255'],
            'utm_campaign' => ['nullable', 'string', 'max:255'],
            'utm_content'  => ['nullable', 'string', 'max:255'],
            'referrer'     => ['nullable', 'string', 'max:65535'], // Реферрер может быть длинным URL
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Пожалуйста, введите ваше имя.',
            'name.min' => 'Имя должно быть не менее 3 символов.',
            'name.max' => 'Имя должно быть не более 255 символов.',
            'phone.required' => 'Номер телефона обязателен для связи.',
            'phone.regex' => 'Пожалуйста, введите корректный белорусский номер телефона в формате +375(XX)XXX-XX-XX.',
            'interest.required' => 'Пожалуйста, выберите, что вас интересует.',
            'interest.enum'     => 'Пожалуйста, выберите, что вас интересует.',
            'comment.required_if' => 'Пожалуйста, напишите ваш вопрос, чтобы мы могли подготовить ответ.',
            'comment.min' => 'Комментарий должен содержать не менее 10 символов.',
            'comment.max' => 'Комментарий должен содержать не более 2000 символов.',
            'product.required_if' => 'Пожалуйста, укажите желаемый сорт кофе или выберите опции подписки.',
            'product.max' => 'Общий текст заказа должен содержать не более 2000 символов.',
        ];
    }
}
