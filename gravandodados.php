<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Criando nossas variáveis para guardar as informações do formulário
    $nome=$_POST['nomesobrenome'];
    $telefone=$_POST['Whatsaap'];
    $email=$_POST['email'];
    //$radio=$_POST['novidades'];
    $date=date("d/m/Y");
    $msg=$_POST['mensagem'];}
    
    echo "<p>Olá seu nome é, ".$nome."</p>"; 
    echo "<p>Seu telefone é: ".$telefone."</p>";
    echo "<p>Seu email é: ".$email."</p>";  
    
?>