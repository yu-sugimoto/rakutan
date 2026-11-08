@php
    $creatives = config('ads.creatives.inline', []);
    $creative = count($creatives) > 0 ? $creatives[$slot % count($creatives)] : null;
@endphp

@if(config('ads.enabled') && $creative)
<aside class="ad-inline" aria-label="広告">
    <span class="ad-label">PR</span>
    <div class="ad-creative">{!! $creative !!}</div>
</aside>
@endif
