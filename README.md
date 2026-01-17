楽単発見器
======================

楽単な授業を共有することを目的とした, 大学の授業レビューサイトです. 
内部/外部出身, サークルの所属の有無などで, 大学の授業を履修する際の学生の事前知識に差があるため, 授業の難しさ（単位の取りやすさ）を共有できるプラットフォームを作りたいと思い開発しました. 
現在, 『楽単発見器』としてリリースしており, 大学のオープンチャット等で利用されています. 

## 概要

このLaravelアプリケーションでは, 投稿機能, 検索機能を実装しました. 
投稿は, 入力 → 確認 → 送信のフェーズで構成されています.
検索は, 絞り込み（学部・授業・先生） → 検索のフェーズで構成されています. 

## デモ

### リリース版
『楽単発見器』→ https://kgu-rakutan.com

### 開発版
※以下, スマホでの操作デモになります. 

https://github.com/user-attachments/assets/f8017e1f-db45-46c7-87e9-80470bd48bb5

https://github.com/user-attachments/assets/de9f5ce8-0e4d-414e-ba72-a8785c6ec229




## 使用技術

- PHP 8.1
- Laravel 10.0
- Bootstrap 5.0.2
- PostgreSQL
- Heroku

## ディレクトリ構造

```
.
├─app
│  ├─Console
│  ├─Exceptions
│  ├─Http
│  │  ├─Controllers
│  │  └─Middleware
│  ├─Models
│  └─Providers
├─bootstrap
│  └─cache
├─config
├─database
│  ├─factories
│  ├─migrations
│  └─seeders
├─public
│  ├─css
│  └─images
├─resources
│  ├─css
│  ├─js
│  └─views
│      ├─layouts
│      └─vendor
│          └─pagination
├─routes
└─tests
   ├─Feature
   └─Unit
```
