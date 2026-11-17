<?php

define('STRETCH_COUNT', 10);

//文字列から SHA256 のハッシュ値を取得
function get_sha256($target) {
    return hash('sha256', $target);
}

//salt + ストレッチングしたパスワードを取得
//
// saltのもとになるシークレットは環境変数から読み込みます。
// 以前はこのファイルに直接書いていたため、公開リポジトリに含まれていました。
// 値は docker-compose.yml が .env から渡します（.env.example を参照）。
function get_password_salt_secret() {
    $secret = getenv('APP_PASSWORD_SALT_SECRET');
    if ($secret === false || $secret === '') {
        exit('APP_PASSWORD_SALT_SECRET が設定されていません。.env.example を .env にコピーして設定してください。');
    }
    return $secret;
}

function get_stretched_password($password) {
    $salt = get_sha256(get_password_salt_secret());
    $retval = '';
    for ($i = 0; $i < STRETCH_COUNT; $i++) {
        $retval = get_sha256($retval . $salt . $password);
    }
    return $retval;
}
