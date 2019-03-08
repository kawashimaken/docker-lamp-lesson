<?php
include './common/header.php';
?>

<?php
if (!$db) {
    print("DB接続失敗<br>");
}
?>

<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>ユーザーアイコンをアップロードする</h1>
    </div>
    <div class="card-body">
        <form method="post" action="res.php" enctype="multipart/form-data" autocomplete="off">
            ステップ１：ファイル:<input class="form-control btn btn-default" type="file" name="from_client_file"><br>
            <input  class="form-control btn btn-primary" type="submit" value="ステップ２：アップロード">
        </form>
    </div>
</div>

<?php
include './common/footer.php';
?>