<?php
include_once('ajax.php');
include_once('db.php');

$name = mysqli_real_escape_string($db, $_POST['name']);
$mail = mysqli_real_escape_string($db, $_POST['mail']);
$pass = mysqli_real_escape_string($db, $_POST['pass']);

$sql = "SELECT COUNT(id) FROM users WHERE email = '{$mail}'"; //check unique email
$result = $db->query($sql);
$mail_count = $result->fetch_row()[0];
if ($mail_count > 0) { //if email exists
    echo 'email_exists';
} else { //write to db
    $sql = "INSERT INTO users (username, email, password) VALUES ('{$name}', '{$mail}', '{$pass}');";
    $result = mysqli_query($db, $sql);
    echo $result;
}

