<?php
include './common/header.php';
?>

<!--会員登録フォーム-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>会員登録フォーム</h1>
    </div>
    <div class="card-body">
        <div class="form-group">
            <form action="confirm.php" method="post">
                <div class="form-group">
                    <label>名前</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label>メール</label>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                    <label>パスワード</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-danger" type="submit"  name="Push" value="確認ページへ">
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include './common/footer.php';
?>

