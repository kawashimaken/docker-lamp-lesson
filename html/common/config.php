<?php

// DB接続情報は環境変数から読み込みます。
// 以前はここに接続ユーザーとパスワードを直接書いていたため、
// 公開リポジトリに認証情報が含まれていました。
// 値は docker-compose.yml が .env から渡します（.env.example を参照）。

$db_host = getenv('MYSQL_HOST') ?: 'mysql';
$db_name = getenv('MYSQL_DATABASE') ?: 'greatappdb';
$db_user = getenv('MYSQL_USER') ?: 'root';
$db_pass = getenv('MYSQL_PASSWORD');

if ($db_pass === false || $db_pass === '') {
    exit('MYSQL_PASSWORD が設定されていません。.env.example を .env にコピーして設定してください。');
}

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_error) {
    exit('DB接続に失敗しました: ' . $db->connect_error);
}

$db->set_charset('utf8');

session_start();
