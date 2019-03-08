<?php
include './common/header.php';
?>
<?php
// IDの取得
$id = $_GET['id'];

//データベース実行
$sql = 'SELECT * FROM users WHERE id = ' . $id;
$res = mysqli_query($db, $sql);
$users = array();
// // 取得した値を表示
while ($row = mysqli_fetch_assoc($res)) {
    $users[] = $row;
}
//DB接続を閉じる
$db->close();
if (!$db) {
    print("切断失敗<br>");
}
?>
<?php ?>
<!--会員編集フォーム-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>会員編集フォーム</h1>
    </div>
    <div class="card-body">
        <div class="form-group">
            <form action="edit_complete.php" method="get" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label>名前</label>
                <input class="form-control" type="text" name="name" value='<?php echo $users[0]['name']; ?>'><br>
                <label>メール</label>
                <input  class="form-control" type="text" name="email" value="<?php echo $users[0]['email']; ?>"><br>
                <input  class="btn btn-primary" type="submit" name="Push" value="保存する">
            </form>
        </div>
    </div>
</div>
<?php
include './common/footer.php';
?>