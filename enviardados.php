<?php 

if (isset($_POST["acao"])){ 

   $nome=$_POST["nomesobrenome"]; 
   $telefone=$_POST["Whatsapp"]; 
   $email=$_POST["email"]; 

   echo "<p>Olá, ".$nome."</p>"; 
   echo "<p>Seu telefone é: ".$telefone."</p>";
   echo "<p>Seu email é: ".$email."</p>";  

   
} 

?>
