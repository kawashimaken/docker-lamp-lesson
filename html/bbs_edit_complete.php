<?php
include './common/header.php';
?>
<?php
mysqli_select_db($db, 'bbs');

//データベース更新

$sql = "UPDATE bbs SET name = '$_GET[name]', title = '$_GET[title]', content = '$_GET[content]'   WHERE id = '$_GET[id]'";
if (!mysqli_query($db, $sql)) {
    echo ("編集に失敗しました<br>");
}

//DB接続を閉じる
$db->close();
if (!$db) {
    print("切断失敗<br>");
}
?>

<div class="alert alert-info">変更完了しました。</div>
<!--変更完了-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>変更完了</h1>
    </div>
    <div class="card-body">
        <a class="btn btn-info" href='bbs_list.php'>掲示板一覧</a>
    </div>
</div>
<?php
include './common/footer.php';
?>