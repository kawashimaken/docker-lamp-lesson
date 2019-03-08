<?php
include './common/header.php';
include './common/auth.php';
?>
<?php
if (!$db) {
    print("DB接続失敗<br>");
}

if (!empty($_POST)) {
//データ追加
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = get_stretched_password($password);

    if ($_POST['email'] != '') {
        $check_stmt = $db->prepare('SELECT * FROM users WHERE email=?');
        $check_stmt->bind_param("s", $_POST['email']);
        //print('検索クエリ -->');

        $check_stmt->execute();
        //print('実行が終わった');
        $arr = $check_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        //print('結果');
        if (!$arr) {

            //
            $query = "
              INSERT INTO
                users (name,email,password,hashed_password)
              VALUES
                ('$name','$email','$password','$hashed_password')
                ";
            if (!$db->query($query)) {
                print "登録が失敗しました<br>";
            }

            //DB接続を閉じる
            $db->close();
            if (!$db) {
                print("切断失敗<br>");
            }
            ?>
            <!--会員登録完了-->
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-title">
                    <h1>会員登録完了しました。</h1>
                    <?php htmlspecialchars($_POST["name"], ENT_QUOTES); ?>さん</p>
                </div>
                <div class="card-body">
                    <a class="btn btn-info" href='member.php'>ユーザー一覧</a>
                </div>
            </div>
            <?php
        } else {
            print('<div class="alert alert-info">');
            print('<p>メールアドレスがすでに使われている</p>');
            print('</div>');
        }

        $check_stmt->close();
    } else {
        print('<div class="alert alert-info">');
        print('<p>メールアドレスがない</p>');
        print('</div>');
    }
}
?>

<?php
include './common/footer.php';
?>