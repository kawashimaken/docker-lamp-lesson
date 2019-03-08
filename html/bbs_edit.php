<?php
include './common/header.php';
?>
<?php
// IDの取得
$post_id = $_GET['post_id'];
//print($post_id);
//データベース実行
$sql = 'SELECT * FROM bbs WHERE id = ' . $post_id;
$res = mysqli_query($db, $sql);
$bbs_list = array();
// // 取得した値を表示
while ($row = mysqli_fetch_assoc($res)) {
    $bbs_list[] = $row;
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
            <form action="bbs_edit_complete.php" method="get" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $post_id; ?>">
                <!--
                <label>名前</label>
                <input class="form-control" type="text" name="name" value='<?php echo $bbs_list[0]['name']; ?>'><br>
                -->
                <label>タイトル</label>
                <input  class="form-control" type="text" name="title" value="<?php echo $bbs_list[0]['title']; ?>"><br>
                <label>コンテンツ</label>
                <input  class="form-control" type="text" name="content" value="<?php echo $bbs_list[0]['content']; ?>"><br>
                <input  class="btn btn-primary" type="submit" name="Push" value="保存する">
            </form>
        </div>
    </div>
</div>
<?php
include './common/footer.php';
?>