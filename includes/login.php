<?php session_start(); ?>
<?php include "db.php"; ?>
<?php include "../admin/functions.php"; ?>

<?php
    if (isset($_POST['login'])) {

        loginUser($username = $_POST['username'], $password = $_POST['password']);

    }
?>
