<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}

  

  if(!empty($_GET['id_maladie'])){
   $req="select * from maladie where id_maladie=?";
   $stmt=$pdo->prepare($req);
   $stmt->execute([$_GET['id_maladie']]);
   foreach ($stmt as $row) {
                $m=$row['nom_maladie'].'./#/.'.$row['photo'].'./#/.'.$row['description_maladie'];  
          }
         echo "$m"; 
  }

  ?>