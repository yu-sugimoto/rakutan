@php
    $creatives = config('ads.creatives.sticky', []);
@endphp

@if(config('ads.enabled') && count($creatives) > 0)
<aside class="ad-sticky" id="ad-sticky" aria-label="広告">
    <div class="ad-sticky-bar">
        <span class="ad-label">PR</span>
        <button type="button" class="ad-sticky-close" id="ad-sticky-close" aria-label="広告を閉じる">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <div class="ad-creative">{!! $creatives[array_rand($creatives)] !!}</div>
</aside>
<script>
    document.getElementById('ad-sticky-close').addEventListener('click', function () {
        document.getElementById('ad-sticky').remove();
    });
</script>
@endif
