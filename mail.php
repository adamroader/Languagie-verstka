<?php

require_once 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$course = $_POST['course'];
$level = $_POST['level'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'fortestonly44@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '8MKj9sWJurNLRxu6CU5H'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('fortestonly44@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('fortestonly44@mail.ru'); // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true); // Set email format to HTML

$mail->Subject = 'Заявка с сайта';
$mail->Body =
    '' .
    $name .
    ' оставил заявку, его телефон ' .
    $phone .
    '<br>Выбранный курс: ' .
    $course .
    '<br>Уровень: ' .
    $level;
$mail->AltBody = '';

if (!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>
