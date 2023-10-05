<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);
$mail->isSMTP();
    $mail->Host ='ssl://smtp.gmail.com:465';
    $mail->SMTPAuth = true;
    $mail->Username='webone@balunand.com';
    $mail->Password='KriyaSheela2023';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('webone@balunand.com','Kriyasheela');
    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);
    $mail->Subject="Password Reset - Kriyasheela";
    $mail->Body=" 

    <!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Password Reset - Kriyasheela</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
 .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    label, input {
      display: block;
      margin-bottom: 10px;
    }
   button{
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
       margin-left: 4%;
    }
    
    @media screen and (max-width: 600px){

button{
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 40px;
       margin-left: 26%;
    }
    }
  </style>
</head>
<body>
<div class='container'>
<div class='logo'>
		<img src='http://localhost/kriyasheela-p2/kriyasheela/images/Balunand_logo.png' class='balu_logo'> 
        <h2>Password Reset - Kriyasheela</h2>
        <p>We have received your request to reset the password. Click the below button to set a new password.</p>
        <a href='http://localhost/kriyasheela-p2/kriyasheela/index.php/Resetpassword_Controller/Resetpassword'><button type='submit' >Reset Password</button></a>
</div>
</div>
</body>


           ";

    $mail->send();
    echo "
    <script>
    alert('Password reset link send successfully');
    document.location.href='http://localhost/kriyasheela-p2/kriyasheela/index.php/Main/login';
    </script>";
}


?>