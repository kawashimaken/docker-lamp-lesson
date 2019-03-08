<?php
include './common/header.php';
include './common/auth.php';
?>
<?php
$is_logged_in = false;

session_start();

if (!empty($_POST)) {
    print('<div class="alert alert-info">$_POSTがあるよ</div>');
    print('<div class="alert alert-info">');
    print('email: ' . $_POST['email'] . '<br>');
    print('password: ' . $_POST['password']);
    print('</div>');
    // ログインの処理
    if ($_POST['email'] != '' && $_POST['password'] != '') {
        $login_stmt = $db->prepare('SELECT * FROM users WHERE email=? AND hashed_password=?');
        $hashed_password = get_stretched_password($_POST['password']);
        $login_stmt->bind_param("ss", $_POST['email'], $hashed_password);
        //print('検索クエリ -->');

        $login_stmt->execute();
        //print('実行が終わった');
        $arr = $login_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        //print('結果');
        if (!$arr) {
            $is_logged_in = false;
            $_SESSION['is_logged_in'] = false;
        } else {
            print('<div class="alert alert-info">');
            var_export($arr);
            print('</div>');
            $is_logged_in = true;
            $_SESSION['is_logged_in'] = true;
            $_SESSION['logged_in_user_id'] = $arr[0]['id'];
            $_COOKIE['logged_in_user_id'] = $arr[0]['id'];
            //print($_SESSION['logged_in_user_id']);
        }

        $login_stmt->close();
    } else {
        $error['login'] = 'blank';
        $is_logged_in = false;
        $_SESSION['is_logged_in'] = false;
    }
}
?>
<!--会員専用画面-->
<?php
if ($is_logged_in) {
    ?>
    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h1>会員専用画面</h1>
        </div>
        <div class="card-body">
            ログイン認証に成功しました。現在ログインしている状態です。<br />
            <p>ようこそ
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h1>おっと！</h1>
        </div>
        <div class="card-body">
            ログインできませんでした<br />
            <?php htmlspecialchars($_POST["name"], ENT_QUOTES);?>さん</p>
        </div>
    </div>
    <?php
}
?>
<?php
include './common/footer.php';
?>