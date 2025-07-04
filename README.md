# Slim-SimpleSkeleton

最低限の Slim アプリケーションスケルトンです。

## セットアップ

事前に PHP（8.3以上）と Composer をインストールしておいてください。

インストールは以下のようにできる予定です：

```bash
composer create-project gallu/slim4-simple-skeleton  [my-app-name]
```

## 動かし方

以下でサーバを起動できます：

```bash
php -S 0.0.0.0:8080 -t public
```

もしくは、以下のスクリプトも使えます：

```bash
composer start
```

## 開発用ツール（任意）

静的解析、コード整形、テスト用ツールがすでに含まれています：

- `phpstan/phpstan`
- `friendsofphp/php-cs-fixer`
- `phpunit/phpunit`

