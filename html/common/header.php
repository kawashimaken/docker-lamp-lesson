<?php
require 'config.php';
?>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
              crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">

    </head>

    <body style="font-family: 'Sawarabi Gothic'; font-weight:100; font-size:18;letter-spacing: 1px;">
        <div class="container">
            <br>
            <div class="alert shadow-lg p-3 mb-5 bg-white rounded">
                <h1 class="text-center">PHPレッスン</h1>
                <hr>
                <!--ユーザーフォーム-->
                <a class="btn btn-info" href='member.php'>ユーザー一覧</a>
                <a class="btn btn-info" href='index.php'>会員登録</a>
                <a class="btn btn-info" href='upload.php'>ユーザアイコンアップロード<a>
                        <hr>
                        <a class="btn btn-primary" href='bbs.php'>掲示板投稿<a>
                                <a class="btn btn-primary" href='bbs_list.php'>掲示板一覧<a>
                                        <hr>
                                        <a class="btn btn-success" href='login.php'>ログインページ<a>
                                                <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#logoutModal">ログアウト</button>
                                                </div>
                                                </div>
                                                <div class="container">
                                                    <!-- Modal -->
                                                    <div id="logoutModal" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">ログアウト</h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <form action="logout.php" method="post">
                                                                        <input class="btn btn-sm btn-danger" type="submit" value="ログアウト" autocomplete="off">
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <?php
                                                    if ($_SESSION['is_logged_in']) {
                                                        echo '<div class="alert alert-success">';
                                                        print('<span>ログイン済み！</span>');
                                                        print('<span>' . $_SESSION['logged_in_user_id'] . '</span>');
                                                        echo '</div>';
                                                    } else {
                                                        echo '<div class="alert alert-danger">';
                                                        print('ログインしていない');
                                                        echo '</div>';
                                                    }
                                                    ?>