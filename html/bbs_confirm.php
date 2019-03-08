<?php
include './common/header.php';
?>
<!--掲示板確認-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>掲示板確認ページ</h1>
        <h3>(下記の内容で投稿をします)</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <form action="bbs_complete.php" method="post" autocomplete="off">

                <div class="alert alert-info">
                    名前:
                    <?php echo $_POST['name']; ?><br>
                    <input class="form-control" type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
                </div>
                <div class="alert alert-warning">
                    ユーザーID:
                    <?php echo $_SESSION['logged_in_user_id']; ?><br>
                    <input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['logged_in_user_id']; ?>">
                </div>
                <div class="alert alert-info">
                    タイトル:
                    <?php echo $_POST['title']; ?><br>
                    <input class="form-control" type="hidden" name="title" value="<?php echo $_POST['title']; ?>">
                </div>
                <div class="alert alert-info">
                    コンテンツ:
                    <?php echo $_POST['content']; ?><br>
                    <input class="form-control" type="hidden" name="content" value="<?php echo $_POST['content']; ?>">
                </div>

                <div class="alert alert-warning">
                    <?php var_dump($_POST); ?>
                </div>
                <input class="btn btn-primary" type="submit" name="save" value="保存して完了ページ">

            </form>
        </div>
    </div>
</div>
<?php
include './common/footer.php';
?>