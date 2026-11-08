@php
    $creatives = config('ads.creatives.interstitial', []);
@endphp

@if(config('ads.enabled') && count($creatives) > 0)
{{-- templateの中身は表示するまで読み込まれないため、表示していない広告のインプレッションは発生しない --}}
<template id="ad-interstitial-template">
    <div class="ad-interstitial" role="dialog" aria-modal="true" aria-label="広告">
        <div class="ad-interstitial-panel">
            <div class="ad-interstitial-bar">
                <span class="ad-label">PR</span>
                <button type="button" class="ad-interstitial-close">
                    閉じて次へ <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="ad-creative">{!! $creatives[array_rand($creatives)] !!}</div>
        </div>
    </div>
</template>
<script>
    (function () {
        var EVERY_PAGES = @json(config('ads.interstitial.every_pages'));
        var COOLDOWN_MS = @json(config('ads.interstitial.cooldown_minutes') * 60 * 1000);
        var STORAGE_KEY = 'rakutan_ad_interstitial';
        var template = document.getElementById('ad-interstitial-template');

        // ページ送りを1回数え、今回全画面広告を出すかどうかを返す。保存できない環境では出さない
        function countPageTurn() {
            try {
                var state = JSON.parse(localStorage.getItem(STORAGE_KEY)) || {};
                var count = (state.count || 0) + 1;
                var lastShownAt = state.lastShownAt || 0;
                var now = Date.now();
                var show = false;

                if (count >= EVERY_PAGES) {
                    count = 0;
                    show = now - lastShownAt >= COOLDOWN_MS;
                }

                localStorage.setItem(STORAGE_KEY, JSON.stringify({
                    count: count,
                    lastShownAt: show ? now : lastShownAt
                }));

                return show;
            } catch (e) {
                return false;
            }
        }

        function showInterstitial(nextUrl) {
            var overlay = template.content.firstElementChild.cloneNode(true);
            var closeButton = overlay.querySelector('.ad-interstitial-close');

            function proceed() {
                window.location.href = nextUrl;
            }

            closeButton.addEventListener('click', proceed);
            overlay.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    proceed();
                }
            });

            document.body.appendChild(overlay);
            document.body.style.overflow = 'hidden';
            closeButton.focus();
        }

        document.querySelectorAll('.paginate a.page-link:not([rel="prev"])').forEach(function (link) {
            link.addEventListener('click', function (event) {
                if (event.ctrlKey || event.metaKey || event.shiftKey) {
                    return;
                }

                if (countPageTurn()) {
                    event.preventDefault();
                    showInterstitial(link.href);
                }
            });
        });
    })();
</script>
@endif
