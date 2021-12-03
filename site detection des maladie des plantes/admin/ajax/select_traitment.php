<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}

  

  if(!empty($_GET['id_trait'])){
   $req="select * from traitement t,maladie m where t.id_maladie=m.id_maladie and id_trait=?";
   $stmt=$pdo->prepare($req);
   $stmt->execute([$_GET['id_trait']]);
   foreach ($stmt as $row) {
                $t=$row['nom_trait'].'./#/.'.$row['photo_trait'].'./#/.'.$row['nom_maladie'].'./#/.'.$row['description_trait'];  
          }
         echo "$t"; 
  }

  ?>