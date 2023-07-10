<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master/src/Exception.php";
require "PHPMailer-master/src/PHPMailer.php";

$mail = new PHPMailer(true); /* Создаем объект MAIL */
$mail->CharSet = "UTF-8"; /* Задаем кодировку UTF-8 */
$mail->IsHTML(true); /* Разрешаем работу с HTML */

$name = $_POST["name"]; /* Принимаем имя пользователя с формы .. */
$email = $_POST["email"]; /* Почту */
$tema = $_POST["tema"]; /* тема */
$message = $_POST["text"]; /* Сообщение с формы */

$email_template = "template_mail.html"; // Считываем файл разметки
$body = file_get_contents($email_template); // Сохраняем данные в $body
$body = str_replace('%name%', $name, $body); // Заменяем строку %name% на имя
$body = str_replace('%email%', $email, $body); // строку %email% на почту
$body = str_replace('%tema%', $tema, $body); // строку %phone% на телефон
$body = str_replace('%text%', $message, $body); // строку %message% на сообщение