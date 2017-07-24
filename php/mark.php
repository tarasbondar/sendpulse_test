<?php
include_once('ajax.php');
include_once('db.php');
session_start();

$id = mysqli_real_escape_string($db, $_POST['id']);

$sql = "SELECT id FROM tasks WHERE id = {$id} AND owner_id = {$_SESSION['user_id']}";
$result = $db->query($sql);
if (mysqli_num_rows($result) == 1) {
    $sql = "UPDATE tasks SET status = 1 WHERE id = {$id};";
    $result = mysqli_query($db, $sql);
    echo $result;
} else {
    echo 'error';
}

