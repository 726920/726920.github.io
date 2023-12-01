<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Display the submitted data
    //echo "Name: " . $name . "<br>";
    //echo "Email: " . $email . "<br>";
    //echo "Message: " . $message . "<br>";
}

 // abaixo as requisições do arquivo phpmailer phpmailer
 require 'var/www/html/site/vendor/autoload.php';
 //require 'mailer/PHPMailerAutoload.php';
 
 try{

    require 'vendors/phpmailer/src/PHPMailer.php';
    require 'vendors/phpmailer/src/SMTP.php';
    require 'vendors/phpmailer/src/Exception.php';
 
 
 $mail = new PHPMailer();// create a new object
 
 $mail->IsSMTP(); // enable SMTP
 $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 $mail->SMTPAutoTLS = false;
 $mail->SMTPSecure = 'tsl'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "smtp.gmail.com";
 $mail->Port = 587; // or 587
 $mail->IsHTML(true);
 $mail->CharSet = "UTF-8";
 $mail->Username = "acelsopinheiroGgmail.com";
 $mail->Password = "G3i54o3";
 $mail->SetFrom("acapinheirodrive@gmail.com");
 $mail->Subject = "Assunto";
 $mail->Body = $layout ;
 $mail->AddAddress("acapseg01@gmail.com");
 
  if(!$mail->Send()) {  
     echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
     echo "Message has been sent";
  }
 }catch(Exception $e){
    print_r($e);
 }
 
 
?>