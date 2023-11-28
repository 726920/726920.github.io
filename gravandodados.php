<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Criando nossas variáveis para guardar as informações do formulário
    $nomesobrenome=$_POST['nomesobrenome'];
    $Whatsapp=$_POST['Whatsapp'];
    $email=$_POST['email'];
    //$radio=$_POST['novidades'];
    //$date=date("d/m/Y");
    $msg=$_POST['mensagem'];
    
    echo "<p>Olá seu nome :, ". $nomesobrenome ."</p>"; 
    echo "<p>Seu telefone : ". $Whatsapp ."</p>";
    echo "<p>Seu email : ". $email ."</p>";  
}  
?>