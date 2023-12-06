<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         Criando nossas variáveis para guardar as informações do formulário
        $name=$_POST['name'];
        $Whatsapp=$_POST['Whatsapp'];
        $email=$_POST['email'];
        //$radio=$_POST['novidades'];
        //$date=date("d/m/Y");
        $message=$_POST['mensagem'];
        
            }

   
    
    // formatando nossa mensagem (que será envaida ao e-mail)
    $mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
    $mensagem.='<b>Nome: </b>'.$name.'<br>';
    $mensagem.='<b>Telefone:</b> '.$Whatsapp.'<br>';
    $mensagem.='<b>E-Mail:</b> '.$email.'<br>';
    //$mensagem.='<b>Deseja receber novidades:</b> '.$radio.'<br>';
    //$mensagem.='<b>Data de envio:</b> '.$date.'<br>';
    $mensagem.='<b>Mensagem:</b> '.$message.'<br>';

       
    use vendor\phpMailer\phpMailer\src\PHPMailer;
    use vendor\phpMailer\phpMailer\src\Exception;
 
    require 'vendor/autoload.php';
 
   $mail = new PHPMailer(true);
 
try {
    $mail->SMTPDebug = 1;            

    $mail->isSMTP(); // Não modifique
    $mail->Host       = 'mail.reunatech.vip';  // SEU HOST (HOSPEDAGEM)
    $mail->SMTPAuth   = true;                        // Manter em true
    $mail->Username   = 'admreuna@reunatech.vip';   //SEU USUÁRIO DE EMAIL
    $mail->Password   = '9302';                   //SUA SENHA DO EMAIL SMTP password
    $mail->SMTPSecure = 'tls';    //TLS OU SSL-VERIFICAR COM A HOSPEDAGEM
    $mail->Port       = '465';     //TCP PORT, VERIFICAR COM A HOSPEDAGEM
    $mail->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO
    
    //Recipient
    $mail->setFrom('admreuna@reunatech.vip','ReunaTech');  //DEVE SER O MESMO EMAIL DO USERNAME
    $mail->addAddress('acapinheirodrive@gmail.com');     // QUAL EMAIL RECEBERÁ A MENSAGEM!
    // $mail->addAddress('ellen@example.com');    // VOCÊ pode incluir quantos receptores quiser
    $mail->addReplyTo($email, $name);  //AQUI SERA O EMAIL PARA O QUAL SERA RESPONDIDO                  
    // $mail->addCC('cc@example.com'); //ADICIONANDO CC
    // $mail->addBCC('bcc@example.com'); //ADICIONANDO BCC

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensagem do Formulário'; //ASSUNTO
    $mail->Body    = $mensagem;  //CORPO DA MENSSSAGEM
    $mail->AltBody = $mensagem;  //CORPO DA MENSAGEM EM FORMA ALT

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