-- greatappdb の初期スキーマ
--
-- 以前はMySQLのデータディレクトリ (mysql/db) をリポジトリに含めていましたが、
-- サーバーのTLS秘密鍵や内部データまで公開されるため、初期化SQLに置き換えました。
-- MySQLコンテナは初回起動時に /docker-entrypoint-initdb.d/ のSQLを自動実行します。
--
-- カラム構成は以前の .frm と各PHPのクエリから復元したものです。
-- 型は本サンプルの用途に合わせて指定しています。

CREATE DATABASE IF NOT EXISTS greatappdb
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE greatappdb;

CREATE TABLE IF NOT EXISTS users (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  name            VARCHAR(255) NOT NULL,
  email           VARCHAR(255) NOT NULL,
  icon_url        VARCHAR(255) DEFAULT NULL,
  password        VARCHAR(255) DEFAULT NULL,
  hashed_password VARCHAR(255) DEFAULT NULL,
  created_at      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY idx_users_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS bbs (
  id        INT AUTO_INCREMENT PRIMARY KEY,
  user_id   INT NOT NULL,
  name      VARCHAR(255) NOT NULL,
  title     VARCHAR(255) NOT NULL,
  content   TEXT,
  post_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY idx_bbs_user_id (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
