<?php
include './common/header.php';
?>
<!--ユーザー登録確認-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>ユーザー登録確認ページ</h1>
        <h3>(下記の内容でユーザー登録をします)</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <form action="complete.php" method="post" autocomplete="off">

                <div class="alert alert-info">
                    名前:
                    <?php echo $_POST['name']; ?><br>
                    <input class="form-control" type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
                </div>
                <div class="alert alert-info">
                    メール:
                    <?php echo $_POST['email']; ?><br>
                    <input class="form-control" type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
                </div>
                <div class="alert alert-info">
                    パスワード:
                    <?php echo $_POST['password']; ?><br>
                    <input class="form-control" type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
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