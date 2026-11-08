<?php

return [

    'enabled' => env('ADS_ENABLED', true),

    // ランキングで広告を挟む間隔（学部数）
    'ranking_interval' => 5,

    'interstitial' => [
        // 全画面広告を出すページ送りの回数
        'every_pages' => 3,
        // 全画面広告を再度表示するまでの最短間隔（分）
        'cooldown_minutes' => 30,
    ],

    /*
    | A8.netの「リンクをコピー」で取得した広告コードを、改変せずに登録する。
    | 枠ごとに未登録（空配列）の場合、その広告枠は表示されない。
    */
    'creatives' => [
        // 下部固定: 320x50
        'sticky' => [
            // ユーアイ免許 素材ID 031
            <<<'HTML'
            <a href="https://px.a8.net/svt/ejp?a8mat=4BGGBM+7QMVW2+3FK2+64Z8X" rel="nofollow">
            <img border="0" width="320" height="50" alt="" src="https://www27.a8.net/svt/bgt?aid=261108130468&wid=001&eno=01&mid=s00000016013001031000&mc=1"></a>
            <img border="0" width="1" height="1" src="https://www16.a8.net/0.gif?a8mat=4BGGBM+7QMVW2+3FK2+64Z8X" alt="">
            HTML,
        ],

        // ランキング内: 300x250（複数登録で順番に表示）
        'inline' => [
            // ユーアイ免許 素材ID 029
            <<<'HTML'
            <a href="https://px.a8.net/svt/ejp?a8mat=4BGGBM+7QMVW2+3FK2+64JTD" rel="nofollow">
            <img border="0" width="300" height="250" alt="" src="https://www24.a8.net/svt/bgt?aid=261108130468&wid=001&eno=01&mid=s00000016013001029000&mc=1"></a>
            <img border="0" width="1" height="1" src="https://www10.a8.net/0.gif?a8mat=4BGGBM+7QMVW2+3FK2+64JTD" alt="">
            HTML,
        ],

        // 全画面: 300x250
        'interstitial' => [
            // ユーアイ免許 素材ID 030
            <<<'HTML'
            <a href="https://px.a8.net/svt/ejp?a8mat=4BGGBM+7QMVW2+3FK2+64RJ5" rel="nofollow">
            <img border="0" width="300" height="250" alt="" src="https://www29.a8.net/svt/bgt?aid=261108130468&wid=001&eno=01&mid=s00000016013001030000&mc=1"></a>
            <img border="0" width="1" height="1" src="https://www17.a8.net/0.gif?a8mat=4BGGBM+7QMVW2+3FK2+64RJ5" alt="">
            HTML,
        ],
    ],

];
