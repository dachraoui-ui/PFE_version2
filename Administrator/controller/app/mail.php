<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mailer/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez l'e-mail et les autres données du formulaire
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $reasonInput = isset($_POST['reasonInput']) ? $_POST['reasonInput'] : '';

    // Le reste de votre code PHPMailer va ici...
}

$mail = new PHPMailer();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'yassine.meddeb2015@gmail.com';
$mail->Password   = 'jwwg nlha vcra ejfa';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

$mail->isHTML(true);
$mail->CharSet = "UTF-8";

try {
    // Recipient email address
    $recipientEmail =  $email;

    // Subject of the email
    $mail->Subject = 'etat de votre formulaire PFE ISET RADES';

    // Body of the email
    $mail->Body ='message par enseignant: ' .$reasonInput;

    // Set recipient
    $mail->addAddress($recipientEmail);

    // Send the email
    if ($mail->send()) {
        echo 'Message has been sent';
    } else {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header('Location: ../page.php')
?>
