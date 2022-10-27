# ポートフォリオ

## 概要
### 開発コンセプト
- ポートフォリオサイトの作成

### 開発背景
- 自分のポートフォリオサイトがほしかったため
- インターンで使用するSymfony,twig,PHPに慣れたい
- インターンで教わったことを復習しながら技術に触れたい

### URL
- 

## 使用技術
- Symfony v5.4.13
- twig 
- PHP 8.1.8

## 構成図


## 機能・非機能一覧


## ローカルでの動作方法
```
$ symfony server:start
```

以下にアクセス
```
https://127.0.0.1:8000/
https://localhost:8000/

https://127.0.0.1:8000/portfolio
https://localhost:8000/portfolio
```

## DB設計
### blogテーブル
| id | title | content | created_at |
| ---- | ---- | ---- | ---- |
| integer(not null, auto increment) | varchar(100) | text | timestamp |

### SQL
```
# テーブル作成
CREATE TABLE blog (
  id SERIAL NOT NULL,
  title VARCHAR(100) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL,
  PRIMARY KEY (id)
);

# ブログ投稿
INSERT INTO blog (
  title,
  content,
  created_at
) VALUES (
  'テスト投稿',
  'こんにちは,Lomです.これからブログを投稿していきたいと思います.',
  current_timestamp
);
```