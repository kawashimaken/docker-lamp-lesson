<?php
include './common/header.php';
?>
<?php
if (!$db) {
    print("DB接続失敗<br>");
}

//データベース実行
$sql = "SELECT bbs.id, users.id  as user_id, users.icon_url, users.name,bbs.title,bbs.content,bbs.post_time FROM bbs as bbs JOIN users as users WHERE bbs.user_id= users.id";
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

<!--投稿一覧-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>投稿一覧</h1>
    </div>
    <div class="card-body">

        <table class="table table-bordered table-dark" border='1'>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">user_id</th>
                <th class="text-center">name</th>
                <th class="text-center">title</th>
                <th class="text-center">content</th>
                <th class="text-center">post_time</th>
                <th class="text-center">icon</th>
                <th class="text-center"></th>
                <th class="text-center"></th>
            </tr>

            <?php
            foreach ($bbs_list as $key => $value) {
                ?>
                <tr>
                    <td class="text-center align-middle">
                        <?php echo $value['id']; ?>
                    </td>
                    <td class="text-center align-middle">
                        <?php echo $value['user_id']; ?>
                    </td>
                    <td class="text-center align-middle">
                        <?php echo $value['name']; ?>
                    </td>
                    <td class="text-center align-middle">
                        <?php echo $value['title']; ?>
                    </td>
                    <td class="text-center align-middle">
                        <?php echo $value['content']; ?>
                    </td>
                    <td class="text-center align-middle">
                        <?php echo $value['post_time']; ?>
                    </td>
                    <td class="text-center align-middle">
                        <div class="text-center">

                            <img class="img-thumbnail card shadow-lg" src="<?php echo $value['icon_url']; ?>" class='img-fluid' >
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <a class="btn btn-sm btn-primary" href="bbs_edit.php?post_id=<?php echo $value['id']; ?>">編集</a>
                    </td>

                    <td class="text-center align-middle">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">投稿削除</button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">削除</h4>
            </div>
            <div class="modal-body">

                <form action="bbs_delete.php" method="post">
                    <input class="btn btn-sm btn-danger" type="submit" value="削除">
                    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php
include './common/footer.php';
?>