<?php
if(!isset($_POST['submit']))
{
  echo "Erro, voce precisa enviar a mensagem!";
  exit;
}
//____________________________Teste_____________________________________
/*

    php para enviar dados do form para newsletter

*/
//_______________________________________________________________________

$visitor_email = $_POST['email'];

//Validate first
if(empty($visitor_email))
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
$email_subject = "Cadastro de newsletter";
$email_body = "Email inscrito: $visitor_email";//Teste 
    
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
