<?php
include_once('ajax.php');
include_once('db.php');

$id      = mysqli_real_escape_string($db, $_POST['id']);
$user_id = mysqli_real_escape_string($db, $_POST['user_id']);
$title   = mysqli_real_escape_string($db, $_POST['title']);
$date    = mysqli_real_escape_string($db, $_POST['date']);
$descr   = mysqli_real_escape_string($db, $_POST['descr']);

$server_date = date('Y-m-d H:i:s');

if ($server_date < $date) {
    if ($id > 0) {
        $sql = "UPDATE tasks SET title = '{$title}', assigned_time = '{$date}', descr = '{$descr}' WHERE id = {$id}";
    } else {
        $sql = "INSERT INTO tasks (title, assigned_time, descr, status, owner_id) VALUES ('{$title}', '{$date}', '{$descr}', '0', '{$user_id}');";
    }
    $result = mysqli_query($db, $sql);
    echo $result;
} else {
    echo 'wrong_date';
}