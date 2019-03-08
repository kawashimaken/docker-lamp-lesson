<?php

define('STRETCH_COUNT', 10);

//文字列から SHA256 のハッシュ値を取得
function get_sha256($target) {
    return hash('sha256', $target);
}

//salt＋ハッシュ化したパスワードを取得
// function get_salted_password($password)
// {
//     $secret = 'vnqw495asdaAGqt';
//     $salt = get_sha256($secret);
//     return get_sha256($salt . $password);
// }
//salt + ストレッチングしたパスワードを取得(推奨)
function get_stretched_password($password) {
    $secret = 'this is my secret app';
    $salt = get_sha256($secret);
    $retval = '';
    for ($i = 0; $i < STRETCH_COUNT; $i++) {
        $retval = get_sha256($retval . $salt . $password);
    }
    return $retval;
}
