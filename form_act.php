<?php
include "conndb.php";
$user_name = trim(filter_input(INPUT_POST, 'fio', FILTER_SANITIZE_STRING));
$user_email = filter_var(trim(filter_input(INPUT_POST, 'user_e-mail', FILTER_SANITIZE_EMAIL)), FILTER_VALIDATE_EMAIL);
$user_comment = trim(filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS));
$user_cat = implode(",", $_POST['category']);
$suser_cat = filter_var(trim($suser_cat), FILTER_SANITIZE_STRING);
if(!empty($user_cat) && !empty($user_name) && !empty($user_email) && !empty($user_comment)) {
$sql = "insert into feedbacks(`categories`,`fio`,`email`,`comment`) values('{$user_cat}','{$user_name}','{$user_email}','{$user_comment}')";
}
if ($link->query($sql) === TRUE) {echo "Новый отзыв добавлен <br/><br/>";} 
else {echo "Ошибка: " . $sql . "<br>" . $link->error;}
$link->close();
$html='<html>
<link rel="icon" type="image/ico" href="feedback.ico" />
<input class="buttonSend" onclick="window.history.back();" title="Вернуться на страницу отправки отзыва" type="button" value="Вернуться"/>';
print $html;