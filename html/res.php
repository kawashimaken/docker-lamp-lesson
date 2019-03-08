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
        <h1>結果</h1>
    </div>
    <div class="card-body">
        <?php
//臨時ファイルができているか（アップロードされているか）チェック
        if (is_uploaded_file($_FILES['from_client_file']['tmp_name'])) {

            //臨時ファイルを保存ファイルにコピーできたか
            $upload_file_folder = "./data/" . $_SESSION['logged_in_user_id'] . "/";
            //このフォルダがなければ、作る
            if (!file_exists($upload_file_folder)) {
                mkdir($upload_file_folder, 0777, true);
            }
            //
            $temp_file = $_FILES['from_client_file']['tmp_name'];
            $new_file = $upload_file_folder . $_FILES['from_client_file']['name'];
            //ファイルを移動するだけ
            if (move_uploaded_file($temp_file, $new_file)) {

                //mysqli_select_db($db, 'users');
                //データベース更新
                $sql = "UPDATE users SET icon_url = '" . $new_file . "' WHERE id = " . $_SESSION['logged_in_user_id'];
                if (!mysqli_query($db, $sql)) {
                    echo ("編集に失敗しました<br>");
                }

                //DB接続を閉じる
                $db->close();
                if (!$db) {
                    print("切断失敗<br>");
                }

                //正常
                print('<div class="alert alert-success">アップロードは成功しました！</div><div class="text-center"><img src="' . $new_file . '" class="img-fluid" alt="Responsive image"></div>');
            } else {
                //コピーに失敗（だいたい、ディレクトリがないか、パーミッションエラー）
                echo '<div class="alert alert-danger">error while saving.</div>';
            }
        } else {
            //そもそもファイルが来ていない。
            echo '<div class="alert alert-danger">file not uploaded.</div>';
        }
        ?>
        <?php
        include './common/footer.php';
        ?>