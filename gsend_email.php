<?php
require 'path/to/PHPMailerAutoload.php';

// Configure your email settings
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'gnrrobotics@gmail.com';
$mail->Password = 'Akak1**XxzYL#34';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom($_POST['email'], $_POST['name']);
$mail->addAddress('gnrrobotics@gmail.com');
$mail->Subject = 'New message from website contact form';
$mail->Body = $_POST['message'];

// Send the email
if (!$mail->send()) {
    echo 'There was an error sending your message. Please try again later.';
} else {
    echo 'Your message has been sent successfully.';
}
?>
