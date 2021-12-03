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
  if(!empty($_GET['prenom']) && !empty($_GET['nom']) 
            && !empty($_GET['ville']) && !empty($_GET['pays']) 
            && !empty($_GET['tele']) && !empty($_GET['daten'])
            && !empty($_GET['sexe']) && !empty($_GET['fonction']) 
            && !empty($_GET['email']) && !empty($_GET['adresse']) 
            && !empty($_GET['password']))
            {
              $count=0;
              $verfemail="select * from user where email_user=?";
                    $stmtemail=$pdo->prepare($verfemail);
                    $stmtemail->execute([$_GET['email']]);
                    foreach ($stmtemail as $row) {
                      $count++;
                    }


              if($count==0){
                $mail = new VerifyEmail();
                // Set the timeout value on stream
                $mail->setStreamTimeoutWait(20);

                // Set debug output mode
                $mail->Debug= TRUE; 
                $mail->Debugoutput= 'html'; 

                // Set email address for SMTP request
                $mail->setEmailFrom('form@email.com');

                // Email to check
                $email = $_GET['email']; 

                // Check if email is valid and exist
                if($mail->check($email)){ 
                    //echo 'Email &lt;'.$email.'&gt; is exist!'; 
                $code=rand(100000,999999);
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
                $mail2->Subject='SMART AGRICULTURE - Email Verification bienvenue dans la communauté SMART AGRICULTURE; veuillez vérifier';
                $mail2->Body='<center><h3>SMART AGRICULTURE - Email Verification</h3></center>
                <br><br><br><br>
                <p>Bienvenue dans la communauté SMART AGRICULTURE.</p>
                <br>
                <p>veuillez vérifier votre adresse e-mail à l\'aide du code ci-dessous pour terminer la configuration du compte!</p>
                <br><br><br>
                <center><h1>'.$code.'</h1></center>
                <br><br><br><br>
                <p>Merci,</p>
                <p>L\'equipe Smart AGRICULTURE.</p>
                ';
                $mail2->Send();

                 echo '<div class="modal-body">
                               <div id="des_body" style="color:red; text-align:center; font-size:15px;"></div>
                               <div class="form-group">
                                <label for="code" style="font-size: 20px;">Code : </label>
                                <input type="text" name="code" id="code" placeholder="entrer le code de verification Email" class="form-control">
                               </div>

                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                 <button type="submit" onclick="vercode()"  value="" id="verifier" class="btn btn-primary btn-flat" coden="'.$code.'" name="sup"></i> Verifier </button>
                        </div>';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }


                }elseif(verifyEmail::validate($email)){ 
                  echo '<div class="modal-body">
                               <div id="des_body"></div>
                               <div class="form-group">
                                
                                 <center> <span id="sp" style="color: red; font-size:20px;">Email &lt;'.$email.'&gt; is valid, but not exist!</span></center>
                               </div>

                        </div>';
                    
                }else{

                }              
                      }else{
                        echo '
                         <div class="modal-body">
                               <div id="des_body"></div>
                               <div class="form-group">
                                
                                 <center> <span id="sp" style="color: red; font-size:20px;"> Ce compte est deja existe</span></center>
                               </div>

                        </div>
                        
                         ';
                         $count=0;
                      }
            }
?>

