<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Criando nossas variáveis para guardar as informações do formulário
        $nomesobrenome=$_POST['nomesobrenome'];
        $Whatsapp=$_POST['Whatsapp'];
        $email=$_POST['email'];
        //$radio=$_POST['novidades'];
        //$date=date("d/m/Y");
        $msg=$_POST['mensagem'];
        
       // echo "<p>Olá seu nome :, ". $nomesobrenome ."</p>"; 
       // echo "<p>Seu telefone : ". $Whatsapp ."</p>";
       // echo "<p>Seu email : ". $email ."</p>";  
    }      
    
    // formatando nossa mensagem (que será envaida ao e-mail)
    $mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
    $mensagem.='<b>Nome: </b>'.$nomesobrenome.'<br>';
    $mensagem.='<b>Telefone:</b> '.$Whatsapp.'<br>';
    $mensagem.='<b>E-Mail:</b> '.$email.'<br>';
    //$mensagem.='<b>Deseja receber novidades:</b> '.$radio.'<br>';
    //$mensagem.='<b>Data de envio:</b> '.$date.'<br>';
    $mensagem.='<b>Mensagem:</b><br> '.$msg;
    // abaixo as requisições do arquivo phpmailer phpmailer
    require("phpmailer/src/PHPMailer.php");
    require("phpmailer/src/SMTP.php");
    require ("phpmailer/src/Exception.php");

    // chamando a função do phpmailer

$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP(); // Não modifique
    $mail->Host       = 'mail.reunatech.vip';  // SEU HOST (HOSPEDAGEM)
    $mail->SMTPAuth   = true;                        // Manter em true
    $mail->Username   = 'acelsopinheiro@zcttech.com';   //SEU USUÁRIO DE EMAIL
    $mail->Password   = '45692Ao';                   //SUA SENHA DO EMAIL SMTP password
    $mail->SMTPSecure = 'TLS';    //TLS OU SSL-VERIFICAR COM A HOSPEDAGEM
    $mail->Port       = 587;     //TCP PORT, VERIFICAR COM A HOSPEDAGEM
    $mail->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO
    
    //Recipients
    $mail->setFrom('acelsopinheiro@zcttech.com', 'Site');  //DEVE SER O MESMO EMAIL DO USERNAME
    $mail->addAddress('acapinheirodrive@gmail.com');     // QUAL EMAIL RECEBERÁ A MENSAGEM!
    // $mail->addAddress('ellen@example.com');    // VOCÊ pode incluir quantos receptores quiser
    $mail->addReplyTo($email, $nome);  //AQUI SERA O EMAIL PARA O QUAL SERA RESPONDIDO                  
    // $mail->addCC('cc@example.com'); //ADICIONANDO CC
    // $mail->addBCC('bcc@example.com'); //ADICIONANDO BCC

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensagem do Formulário'; //ASSUNTO
    $mail->Body    = $mensagem;  //CORPO DA MENSAGEM
    $mail->AltBody = $mensagem;  //CORPO DA MENSAGEM EM FORMA ALT

    // $mail->send();
    if(!$mail->Send()) {
        echo "<script>alert('Erro ao enviar o E-Mail');window.location.assign('index.php');</script>";
     }else{
        echo "<script>alert('E-Mail enviado com sucesso!');window.location.assign('index.php');</script>";
     }
     die
?>