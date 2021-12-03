<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}


  if(!empty($_GET['id_user'])){
   $req="select * from user where id_user=?";
   $stmt=$pdo->prepare($req);
   $stmt->execute([$_GET['id_user']]);
   foreach ($stmt as $row) {
                $user=$row['nom_user'];  
          }

         echo "$user"; 
  }

  ?>