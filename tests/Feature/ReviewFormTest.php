<?php

namespace Tests\Feature;

use App\Models\Review;
use App\Rules\NoNgWords;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ReviewFormTest extends TestCase
{
    private array $valid = [
        'department' => '文学部',
        'lecture' => '哲学入門',
        'year' => 2026,
        'teacher' => '山田',
        'review_easy' => 4,
        'review_comment' => '課題ばかりですが出席すれば単位は取れます',
    ];

    #[DataProvider('blockedTexts')]
    public function test_ng_words_are_detected_across_notations(string $text): void
    {
        $this->assertTrue(NoNgWords::contains($text));
    }

    public static function blockedTexts(): array
    {
        return [
            'exact' => ['あの先生は死ね'],
            'katakana' => ['クソ教授だった'],
            'half width kana' => ['ｸｿ教授だった'],
            'spaces inserted' => ['死 ね'],
            'symbols inserted' => ['く.そ/教*授'],
            'full width space' => ['き　も　い'],
        ];
    }

    #[DataProvider('allowedTexts')]
    public function test_ordinary_reviews_are_not_flagged(string $text): void
    {
        $this->assertFalse(NoNgWords::contains($text));
    }

    public static function allowedTexts(): array
    {
        return [
            'bakari' => ['課題ばかりで大変でした'],
            'sukoshi ne' => ['少しね、難しいかも'],
            'tokoro sugoku' => ['いいところすごく多いです'],
            'bakamitai' => ['馬鹿みたいに楽な授業'],
            'yakusoku' => ['約束のくそく'],
            'kieru' => ['板書がすぐ消える'],
            'empty' => [''],
        ];
    }

    public function test_form_offers_2026(): void
    {
        $this->get('/form')->assertOk()->assertSee('<option value="2026">2026</option>', false);
    }

    public function test_clean_review_reaches_confirmation(): void
    {
        $this->post('/form/check', $this->valid)->assertOk()->assertSee('哲学入門');
    }

    public function test_ng_review_returns_to_form_with_input_kept(): void
    {
        $response = $this->from('/form')->post('/form/check', ['review_comment' => 'クソ教授'] + $this->valid);

        $response->assertRedirect('/form')->assertSessionHasErrors('review_comment');
        $this->assertSame('哲学入門', session()->getOldInput('lecture'));
    }

    public function test_tampered_confirmation_is_rejected_before_saving(): void
    {
        $response = $this->post('/form/thanks', ['action' => 'submit', 'review_comment' => '死ね'] + $this->valid);

        $response->assertRedirect('/form')->assertSessionHasErrors('review_comment');
    }

    #[DataProvider('invalidFields')]
    public function test_invalid_fields_are_rejected(string $field, mixed $value): void
    {
        $this->post('/form/check', [$field => $value] + $this->valid)
            ->assertRedirect('/form')
            ->assertSessionHasErrors($field);
    }

    public static function invalidFields(): array
    {
        return [
            'comment too long' => ['review_comment', str_repeat('あ', 301)],
            'lecture too long' => ['lecture', str_repeat('あ', 51)],
            'lecture with space' => ['lecture', '哲学　入門'],
            'rating out of range' => ['review_easy', 6],
            'future year' => ['year', 2099],
            'missing department' => ['department', ''],
        ];
    }
}
