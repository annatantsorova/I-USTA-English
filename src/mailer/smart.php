<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'app.debugmail.io';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ac2ba8cf-2426-413d-85a9-ed7761ffadb9';                 // Наш логин
$mail->Password = '78f0e7ab-1f5c-4854-9461-37f0fe70334f';                           // Наш пароль от ящика
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to
 
$mail->setFrom('john.doe@example.org', 'John Doe');   // От кого письмо 
$mail->addAddress('segajaj356@abudat.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные';
$mail->Body    = '
		Пользователь оставил данные <br> 
	Имя: ' . $name . ' <br>
	Номер телефона: ' . $phone . '<br>
	E-mail: ' . $email . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>
return array(
    "driver" => "smtp",
    "host" => "app.debugmail.io",
    "port" => "25",
    "from" => array(
        "address" => "john.doe@example.org",
        "name" => "John Doe"
    ),
    "encryption" => "tls",
    "username" => "ac2ba8cf-2426-413d-85a9-ed7761ffadb9",
    "password" => "78f0e7ab-1f5c-4854-9461-37f0fe70334f",
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend" => false
);