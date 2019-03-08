<?php
include './common/header.php';
?>

<!--掲示板フォーム-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>掲示板フォーム</h1>
    </div>
    <div class="card-body">
        <div class="form-group">
            <form action="bbs_confirm.php" method="post" autocomplete="off">
                <!--
                  <div class="form-group">
                  <label>名前</label>
                  <input class="form-control" type="text" name="name"/>
                </div>
                -->
                <div class="form-group">
                    <label>タイトル</label>
                    <input class="form-control" type="text" name="title"/>
                </div>
                <div class="form-group">
                    <label>コンテンツ</label>
                    <input type="text" class="form-control"  name="content"/>
                </div>

                <div class="form-group">
                    <?php
                    if ($_SESSION['is_logged_in']) {
                        print('<input class="form-control btn btn-danger" type="submit"  name="Push" value="確認ページへ">');
                    } else {
                        print('<div class="alert alert-danger">ログインしていないから、投稿できません！</div>');
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include './common/footer.php';
?>

