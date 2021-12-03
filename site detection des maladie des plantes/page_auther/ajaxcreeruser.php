<?php

try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}
if(!empty($_GET['prenom']) && !empty($_GET['nom']) 
            && !empty($_GET['ville']) && !empty($_GET['pays']) 
            && !empty($_GET['tele']) && !empty($_GET['daten'])
            && !empty($_GET['sexe']) && !empty($_GET['fonction']) 
            && !empty($_GET['email']) && !empty($_GET['adresse']) 
            && !empty($_GET['password']))
            {
   $req="insert into user(nom_user,prenom_user,date_naissance,sexe_user,fonction_user,tel_user,email_user,adresse_user,ville_user,pays_user) values(?,?,?,?,?,?,?,?,?,?)";
              $stmt=$pdo->prepare($req);
              $stmt->execute([$_GET['nom'],$_GET['prenom'],
                              $_GET['daten'],$_GET['sexe'],
                              $_GET['fonction'],$_GET['tele'],
                              $_GET['email'],$_GET['adresse'],
                              $_GET['ville'],$_GET['pays']]);
              $req2="insert into compte(login,password,date_inscription,status_compte,id_user) values(?,?,?,?,?)";
              $stmt2=$pdo->prepare($req2);
                    $req3="select id_user from user where email_user=?";
                    $stmt3=$pdo->prepare($req3);
                    $stmt3->execute([$_GET['email']]);
                    foreach ($stmt3 as $row) {
                      $id_user=$row['id_user'];
                    }
                    $today=date('Y-m-d');
                    $stmt2->execute([$_GET['email'],$_GET['password'],
                    $today,'2',$id_user]);
                    $_SESSION['user']=$_GET['email'];

                }

?>