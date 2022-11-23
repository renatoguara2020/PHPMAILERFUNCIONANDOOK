<?php


  require('./PHPMailer-master/src/PHPMailer.php');
  require("./PHPMailer-master/src/SMTP.php");
  require('./PHPMailer-master/src/Exception.php');




if(!isset($_POST['nome']) && $_POST['nome'] != '' && $_POST['nome'] != NULL){


  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);


    
}

if(!isset($_POST['email']) && $_POST['email'] != '' && $_POST['email'] != NULL){

  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    
}
  
  $assunto = $_POST['assunto'];


  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;


  
    $mail = new PHPMailer(true);
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    //  $email->SMTPAuth = true;
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "renatoguara2020@gmail.com";
    $mail->Password = "gpg";
    $mail->SetFrom("renatoguara2020@gmail.com");
    $mail->Subject = "PHP MAILER";
    $mail->Body = "HELLO WORLD COM RENATO ALVES SOARES COM PHP MAILER E NATHANZINHO";
    $mail->AddAddress("renatoguara2019@yahoo.com");

    

     if(!$mail->Send()) {
        echo "Mailer Error:  $mail->ErrorInfo ";
     } else {
        echo "<h1>Message has been sent to renatoguara2020</h1>";
     }

?>