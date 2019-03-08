<?php
include './common/header.php';
?>
<?php
if (!$db) {
    print("DB接続失敗<br>");
}

//データベース実行
$sql = "SELECT * FROM users ";
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

<!--ユーザー一覧-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>ユーザー一覧</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-dark" border='1'>
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">name</th>
                    <th class="text-center">email</th>
                    <th class="text-center">password</th>
                    <th class="text-center">
                        <div>
                            暗号化されたパスワード<br>
                            （勉強用のために取得、表示している）
                            <div>
                                </th>
                                <th class="text-center">created_at</th>
                                <th class="text-center"></th>
                                <th class="text-center"></th>
                                </tr>

                                <?php
                                foreach ($users as $key => $value) {
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <?php echo $value['id']; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php echo $value['name']; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php echo $value['email']; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="badge badge-warning">
                                                <?php echo $value['password']; ?>
                                            </div>
                                        </td><td class="text-center align-middle">
                                            <div class="badge badge-dark">
                                                <?php echo $value['hashed_password']; ?>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php echo $value['created_at']; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $value['id']; ?>">編集</a>
                                        </td>

                                        <td class="text-center align-middle">
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">ユーザー削除</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </table>
                            </div>
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

                                        <form action="delete.php" method="post" autocomplete="off">
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