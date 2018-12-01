<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	
header('Content-Type: text/html; charset=UTF-8');

mb_internal_encoding('UTF-8'); 
mb_http_output('UTF-8'); 
mb_http_input('UTF-8'); 
mb_regex_encoding('UTF-8'); 

sleep(2);

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {

  if(trim($_POST['name']) == '') {
  $hasError = true;
  } else {
  $name = trim($_POST['name']);
  }
  
  if(trim($_POST['email']) == '')  {
  $hasError = true;
  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
  $hasError = true;
	echo "<img src='media/nok1.png' style='width:90px;height=90px'>
  <h2 style='color:red;'>Сообщение не отправлено!</h2> 
    <p style='color:red;'>Пожалуйста, введите корректный email и повторите попытку.</p>";
  } else {
  $email = trim($_POST['email']);
  }

  if(trim($_POST['message']) == '') {
  $hasError = true;
  } else {
  if(function_exists('stripslashes')) {
  $message = stripslashes(trim($_POST['message']));
  } else {
  $message = trim($_POST['message']);
  }
  }

  if(!isset($hasError)) {
    $to = "qa1.technology@gmail.com";
    $subject= "Message from site.ru";
    $header="From: site.ru";
    $header.="\nContent-type: text/plain; charset=\"utf-8\"";
	
    $message = "BHTML \r\nEmail: $email \nИмя: $name \n\nТекс сообщения:\n$message";
	
    mail($to, $subject, $message, $header);

    $emailSent = true;

    echo "<img src='media/ok1.png' style='width:90px;height=90px'>
          <h2 style='color:green;'>Сообщение принято!</h2> 
          <p>Мы свяжемся с Вами в ближайшее время!</p>";
  }
}else {
    echo 
    "
    <img src='media/nok1.png' style='width:90px;height=90px'>
    <h2 style='color:red;'>Ошибка!</h2> 
    <p>К сожалению, не удалось отправить сообщение. Пожалуйста, отправте Ваше сообщение на почту либо напишите нам в мессенджер.</p>";
}

}
?>
