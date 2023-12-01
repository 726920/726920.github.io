<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         Criando nossas variáveis para guardar as informações do formulário
        $nomesobrenome=$_POST['nomesobrenome'];
        $Whatsapp=$_POST['Whatsapp'];
        $email=$_POST['email'];
        //$radio=$_POST['novidades'];
        //$date=date("d/m/Y");
        $msg=$_POST['mensagem'];
        
        //echo "<p>Olá seu nome :, ". $nomesobrenome ."</p>"; 
        //echo "<p>Seu telefone : ". $Whatsapp ."</p>";
        //echo "<p>Seu email : ". $email ."</p>";  
    }

   
    
    // formatando nossa mensagem (que será envaida ao e-mail)
    $mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
    $mensagem.='<b>Nome: </b>'.$nomesobrenome.'<br>';
    $mensagem.='<b>Telefone:</b> '.$Whatsapp.'<br>';
    $mensagem.='<b>E-Mail:</b> '.$email.'<br>';
    //$mensagem.='<b>Deseja receber novidades:</b> '.$radio.'<br>';
    //$mensagem.='<b>Data de envio:</b> '.$date.'<br>';
    $mensagem.='<b>Mensagem:</b> '.$msg.'<br>';

       
   // use PHPMailer\PHPMailer\PHPMailer;
   // use PHPMailer\PHPMailer\Exception;
 
    //require 'vendor/autoload.php';
 
    $phpmailer = new PHPMailer();
 
try {

    
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'de8da53f17bbd8';
    $phpmailer->Password = '3d19bb3f81f3a7';
    $mail->SMTPDebug = 2;            

        
    //Recipients
    //$mail->setFrom('acelsopinheiro@zcttech.com','ReunaTech');  //DEVE SER O MESMO EMAIL DO USERNAME
    $phpmailer->addAddress('adm@reunatech.vip');     // QUAL EMAIL RECEBERÁ A MENSAGEM!
    // $mail->addAddress('ellen@example.com');    // VOCÊ pode incluir quantos receptores quiser
    $phpmailer->addReplyTo($email, $nome);  //AQUI SERA O EMAIL PARA O QUAL SERA RESPONDIDO                  
    // $mail->addCC('cc@example.com'); //ADICIONANDO CC
    // $mail->addBCC('bcc@example.com'); //ADICIONANDO BCC

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $phpmailer->isHTML(true);                                  // Set email format to HTML
    $phpmailer->Subject = 'Mensagem do Formulário'; //ASSUNTO
    $phpmailer->Body    = $mensagem;  //CORPO DA MENSAGEM
    $phpmailer->AltBody = $mensagem;  //CORPO DA MENSAGEM EM FORMA ALT

// Limpa os destinatários e os anexos
//$mail->ClearAllRecipients();
//$mail->ClearAttachments();
echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

//if(!$mail->send()) {
  //  echo 'Não foi possível enviar a mensagem.<br>';
  //  error_log("Erro no envio do email");
  //  error_log($mail->ErrorInfo);    
//} else {
 //   echo 'Mensagem enviada.';
//} 

?>