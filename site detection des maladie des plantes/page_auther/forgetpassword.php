<?php
require_once 'verifyemail.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}




  $i=0;
  if(!empty($_GET['email']))
            {
              $count=0;
              $verfemail="select * from user u,compte c where email_user=? and c.id_user=u.id_user";
                    $stmtemail=$pdo->prepare($verfemail);
                    $stmtemail->execute([$_GET['email']]);
                    foreach ($stmtemail as $row) {
                      $pass=$row['password'];
                      $count++;
                    }


              if($count!=0){
                $count=0;
                $mail2 = new PHPMailer(true);
                try {
                $mail2->SMTPDebug = SMTP::DEBUG_SERVER; 
                $mail2->isSMTP();
                $mail2->Host='smtp.gmail.com';
                $mail2->SMTPAuth   = true;  
                $mail2->Username="labofsdm2020@gmail.com";
                $mail2->Password='Labofsdm@2020';
                $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;//'ssl';
                $mail2->Port='587';//'465';
                $mail2->isHTML();
                $mail2->SetFrom('form@gmail.com');
                $mail2->addAddress($_GET['email']);
                $mail2->Subject='SMART AGRICULTURE - votre Password bienvenue dans la communauté SMART AGRICULTURE';
                $mail2->Body='<center><h3>SMART AGRICULTURE - Votre Password</h3></center>
                <br><br><br><br>
                <p>Bienvenue dans la communauté SMART AGRICULTURE.</p>
                <br>
                <p>voila votre password</p>
                <br><br><br>
                <center><h1>'.$pass.'</h1></center>
                <br><br><br><br>
                <p>Merci,</p>
                <p>L\'equipe Smart AGRICULTURE.</p>
                ';
                $mail2->Send();

                 echo 'Le mot de passe a été envoyé à votre email';
                } catch (Exception $e) {
                    echo "pass could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
         
                      }else{
                        echo 'il n\'y a pas de compte créé par cet email';
                      }
            }
?>
