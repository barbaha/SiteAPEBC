<?php
if(!isset($_POST['submit']))
{
	echo "Erro, voce precisa enviar a mensagem!";
  exit;
}
//____________________________Teste_____________________________________
/*

    php para enviar dados do form para contato

*/
//_______________________________________________________________________

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

//Validate first
if(empty($name)||empty($visitor_email)||(empty($number))) 
{
    echo "Nome, email e numero obrigatorios!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Email invalido!";
    exit;
}

$email_from = 'barbaha@barbaha.pe.hu';
$email_subject = "$name entrou em contato pelo site";
$email_body = "Nome: $name;\n Email: $visitor_email; \n Número: $number; \n".
    "Conteúdo da mensagem: \n$message";//Teste 
    
$to = "barbaha.mariah@hotmail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);

header('Location: index.html');

function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 
