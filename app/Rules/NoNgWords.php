<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoNgWords implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (self::contains((string) $value)) {
            $fail('不適切な表現が含まれている可能性があります。表現を修正してください。');
        }
    }

    public static function contains(string $text): bool
    {
        $normalized = self::normalize($text);

        foreach (config('ng_words') as $word) {
            if (str_contains($normalized, self::normalize($word))) {
                return true;
            }
        }

        return false;
    }

    /**
     * 全角/半角・カタカナ/ひらがな・大文字/小文字をそろえ、空白や記号を取り除く。
     */
    private static function normalize(string $text): string
    {
        // 半角カナを全角にしてからでないと、ひらがなに変換されない
        $text = mb_convert_kana(mb_convert_kana($text, 'KVas', 'UTF-8'), 'c', 'UTF-8');
        $text = mb_strtolower($text, 'UTF-8');

        return (string) preg_replace('/[\s\p{P}\p{S}\p{Cf}]+/u', '', $text);
    }
}
