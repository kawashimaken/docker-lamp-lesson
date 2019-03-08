<?php
include './common/header.php';
?>

<!--ログインフォーム-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>ログインフォーム</h1>
    </div>
    <div class="card-body">
        <div class="form-group">
            <form action="login_complete.php" method="post" autocomplete="off">
                <label>メール</label>
                <input class="form-control" type="email" name="email" placeholder="メールアドレス" required /><br>
                <label>パスワード</label>
                <input class="form-control" type="password" name="password" placeholder="パスワード" required /><br>
                <button class="btn btn-success" type="submit" name="login">ログインする</button>
            </form>
        </div>
    </div>
</div>
<?php
include './common/footer.php';
?>