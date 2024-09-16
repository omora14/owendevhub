<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 

$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com'; 
  $mail->SMTPAuth = true;
  $mail->Username = 'your-email@gmail.com'; 
  $mail->Password = 'your-email-password'; 
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  //Recipients
  $mail->setFrom($_POST['email'], $_POST['name']);
  $mail->addAddress('morales.owen@icloud.com'); 

  //Content
  $mail->isHTML(true);
  $mail->Subject = $_POST['subject'];
  $mail->Body    = nl2br($_POST['message']); 

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
