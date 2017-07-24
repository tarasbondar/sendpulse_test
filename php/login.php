<?php
include_once('ajax.php');
include("db.php");
session_start();

//if($_SERVER["REQUEST_METHOD"] == "POST") { // username and password sent from form

    $mail = mysqli_real_escape_string($db,$_POST['mail']);
    $pass = mysqli_real_escape_string($db,$_POST['pass']);

    $sql = "SELECT id, username FROM users WHERE email = '$mail' and password = '$pass'";
    $result = $db->query($sql);

    if (mysqli_num_rows($result) == 1) {
        $row = $result->fetch_row();
        $id = $row[0];
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $row[1];
        echo $id;
    } else {
        echo 'no_match';
    }
//}