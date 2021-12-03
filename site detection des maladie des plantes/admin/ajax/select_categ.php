<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}

  

  if(!empty($_GET['id_categ'])){
   $req="select * from categoriie where id_categ=?";
   $stmt=$pdo->prepare($req);
   $stmt->execute([$_GET['id_categ']]);
   foreach ($stmt as $row) {
                $c=$row['nom_categ'].'./#/.'.$row['description'];  
          }
         echo "$c"; 
  }

  ?>