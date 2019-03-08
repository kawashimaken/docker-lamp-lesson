<?php
include './common/header.php';
$_SESSION['is_logged_in'] = false;
session_destroy();
?>
<!--ログアウト-->
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-title">
        <h1>ログアウトしました</h1>
    </div>
    <div class="card-body">

        <?php
        include './common/footer.php';
        ?>
