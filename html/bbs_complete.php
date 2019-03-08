<?php
include './common/header.php';
?>
<?php
if (!$db) {
    print("DB接続失敗<br>");
}

//データ追加

$name = $_POST['name'];
$title = $_POST['title'];
$content = $_POST['content'];
$user_id = $_POST['user_id'];
//
$query = "
  INSERT INTO
    bbs (name,title,content,user_id)
  VALUES
    ('$name','$title','$content','$user_id')
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
<!--投稿完了-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>投稿完了しました。</h1>
    </div>
    <div class="card-body">
        <a class="btn btn-info" href='bbs_list.php'>掲示板一覧</a>
    </div>
</div>
<?php
include './common/footer.php';
?>