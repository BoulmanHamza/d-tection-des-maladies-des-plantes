<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}

  

  if(!empty($_GET['id_dossier'])){
   $req="select * from dossier_medicale d,plante p ,maladie m where p.id_plantes=d.id_plantes and d.id_maladie=m.id_maladie and id_dossier=?";
   $stmt=$pdo->prepare($req);
   $stmt->execute([$_GET['id_dossier']]);
   foreach ($stmt as $row) {
                $d=$row['nom_plantes'].'./#/.'.$row['nom_maladie'].'./#/.'.$row['description_dossier'].'./#/.'.$row['date_dossier'];  
          }
         echo "$d"; 
  }

  ?>