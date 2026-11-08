<?php

namespace App\Http\Requests;

use App\Rules\NoNgWords;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    protected $redirectRoute = 'review.form';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // スペース禁止（全角スペースを含む）
        $noSpaces = 'regex:/^[^\s\x{3000}]+$/u';

        return [
            'department' => ['required', 'string', 'max:50'],
            'lecture' => ['required', 'string', 'max:50', $noSpaces, new NoNgWords],
            'year' => ['required', 'integer', 'between:2021,'.now()->year],
            'teacher' => ['required', 'string', 'max:50', $noSpaces, new NoNgWords],
            'review_easy' => ['required', 'integer', 'between:1,5'],
            'review_comment' => ['required', 'string', 'max:300', new NoNgWords],
        ];
    }

    public function attributes(): array
    {
        return [
            'department' => '学部名',
            'lecture' => '受講講義',
            'year' => '受講年度',
            'teacher' => '先生名',
            'review_easy' => '楽単度',
            'review_comment' => 'コメント',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attributeを入力してください。',
            'max' => ':attributeは:max文字以内で入力してください。',
            'regex' => ':attributeにスペースは使えません。',
            'integer' => ':attributeの値が正しくありません。',
            'between' => ':attributeの値が正しくありません。',
            'string' => ':attributeの値が正しくありません。',
        ];
    }
}
