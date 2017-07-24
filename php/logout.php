<?php
include_once('ajax.php');
session_start();

if(session_destroy()) {
    header('Location: /');
}
