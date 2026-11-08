<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdsTest extends TestCase
{
    public function test_slots_render_nothing_without_creatives(): void
    {
        config(['ads.creatives' => ['sticky' => [], 'inline' => [], 'interstitial' => []]]);

        $this->assertSame('', trim(view('ads.sticky')->render()));
        $this->assertSame('', trim(view('ads.inline', ['slot' => 0])->render()));
        $this->assertSame('', trim(view('ads.interstitial')->render()));
    }

    public function test_slots_render_nothing_when_disabled(): void
    {
        config(['ads.enabled' => false, 'ads.creatives.sticky' => ['<a>ad</a>']]);

        $this->assertSame('', trim(view('ads.sticky')->render()));
    }

    public function test_sticky_renders_creative_unescaped_with_pr_label(): void
    {
        config(['ads.enabled' => true, 'ads.creatives.sticky' => ['<a href="#x">ad</a>']]);

        $html = view('ads.sticky')->render();

        $this->assertStringContainsString('<a href="#x">ad</a>', $html);
        $this->assertStringContainsString('>PR<', $html);
    }

    public function test_inline_rotates_creatives_by_slot(): void
    {
        config(['ads.enabled' => true, 'ads.creatives.inline' => ['<b>first</b>', '<b>second</b>']]);

        $this->assertStringContainsString('first', view('ads.inline', ['slot' => 0])->render());
        $this->assertStringContainsString('second', view('ads.inline', ['slot' => 1])->render());
        $this->assertStringContainsString('first', view('ads.inline', ['slot' => 2])->render());
    }

    public function test_interstitial_creative_stays_inside_template(): void
    {
        config(['ads.enabled' => true, 'ads.creatives.interstitial' => ['<img src="#ad">']]);

        $html = view('ads.interstitial')->render();

        $templateEnd = strpos($html, '</template>');
        $this->assertNotFalse($templateEnd);
        $this->assertLessThan($templateEnd, strpos($html, '<img src="#ad">'));
    }
}
