<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["submit"])){

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'calcaaqui.noreply@gmail.com';
    $mail->Password = 'pngnrutleobqysue';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('calcaaqui.noreply@gmail.com');

    $mail->isHTML(true);

    $mail->addAddress($_POST["mail"]);
    $mail->Subject = $_POST['sub'];
    $mail->Body = $_POST['msg'];

    $mail->send();


    header('Location: testes.php');



}
