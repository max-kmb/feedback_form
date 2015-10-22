<?php 
$link = new mysqli('localhost','feedback_user','feedback','fbdb');
if ($link->connect_error) {
    die("Ошибка подключения к базе данных!: %s\n" . $link->connect_error);
    exit();}  
?>
