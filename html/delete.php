<?php
include './common/header.php';
?>

<body>
    <?php
    mysqli_select_db($db, 'users');

//  データ削除
    $sql = "DELETE FROM users WHERE id = $_POST[id]";

    $res = $db->query($sql);

//DB接続を閉じる
    $db->close();
    if (!$db) {
        print("切断失敗<br>");
    }
    ?>
    <div class="alert alert-info">削除完しました</div>
    <!--変更完了-->
    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h1>削除完了</h1>
        </div>
        <div class="card-body">
            <a class="btn btn-info" href='member.php'>ユーザー一覧</a>
        </div>
    </div>
    <?php
    include './common/footer.php';
    ?>