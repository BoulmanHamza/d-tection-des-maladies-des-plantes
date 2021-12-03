<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}


  if(!empty($_GET['id_user'])){
   $req="select * from commentaire where id_commentaire=?";
   $stmt=$pdo->prepare($req);
   $stmt->execute([$_GET['id_user']]);
   foreach ($stmt as $row) {
                $user=$row['commentaire'];  
          }

         echo "$user"; 
  }

  ?>