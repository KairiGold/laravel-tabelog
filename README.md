# NAGOYAMESHI

食べログ風の飲食店予約サイト「NAGOYAMESHI」。名古屋市のB級グルメに特化したレビュー・予約サイトです。

## 技術スタック

- PHP 8.2 / Laravel 10.x
- MySQL（開発環境はXAMPP同梱のMariaDB）
- Laravel Breeze（Blade + Tailwind CSS）
- Laravel Cashier（Stripe）— 有料会員（月額300円）のサブスク課金用

## セットアップ

```bash
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
# .env の DB_DATABASE, DB_USERNAME, DB_PASSWORD を環境に合わせて設定
php artisan migrate --seed
php artisan serve
```

- 会員側: http://localhost:8000/
    - シード済みテストユーザー: `test@example.com`（パスワードは `password`）
- 管理者側: http://localhost:8000/admin/login
    - シード済み管理者アカウント: `admin@example.com` / `password`

Stripe連携を使う場合は `.env` の `STRIPE_KEY` / `STRIPE_SECRET` にテストキーを設定してください。

## 現在の実装状況（土台構築フェーズ）

- Laravel新規インストール、MySQL接続設定
- 会員用（`web`ガード）／管理者用（`admin`ガード）の二重認証基盤
    - 会員: Breezeによる登録・ログイン・メール認証・パスワード再設定
    - 管理者: `/admin/login` からのログインのみ（新規登録なし）
- 主要テーブルのmigration・モデル・リレーション
    - `users`（プロフィール項目追加）, `admins`, `categories`, `shops`, `reviews`, `reservations`, `favorites`, `companies`, `terms`
- Laravel Cashier導入（`subscriptions` 等のテーブル作成済み、Stripe連携は今後設定）
- 動作確認用の簡易ページ（トップページ・会社概要・利用規約・管理者トップ（集計）ページ）
- 開発用シーダー（管理者1件、カテゴリ8件、店舗20件、会社概要1件、利用規約1件、テスト会員1件）

検索・絞り込み・並べ替え、レビュー投稿、予約、お気に入り、有料会員登録（Stripe決済）、管理画面での各種CRUDなどの機能は未実装です。今後のセッションで順次実装していきます。

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
