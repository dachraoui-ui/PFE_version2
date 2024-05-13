<?php
require_once 'email.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'mailer/autoload.php';

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

?>

