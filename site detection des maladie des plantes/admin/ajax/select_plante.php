<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}

  

  if(!empty($_GET['id_plante'])){
   $req="select * from categoriie,plante where id_categ=id_categorie and id_plantes=?";
   $stmt=$pdo->prepare($req);
   $stmt->execute([$_GET['id_plante']]);
   foreach ($stmt as $row) {
                $p=$row['nom_plantes'].'./#/.'.$row['reference_plantes'].'./#/.'.$row['pays_mere'].'./#/.'.$row['photo_plante'].'./#/.'.$row['nom_categ'].'./#/.'.$row['region'].'./#/.'.$row['plante_Medicine'].'./#/.'.$row['description'];  
          }
         echo "$p"; 
  }

  ?>

  