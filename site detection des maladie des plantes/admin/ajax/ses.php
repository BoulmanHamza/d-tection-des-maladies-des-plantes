<?php


try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}


  if(!empty($_GET['id_plantes'])){
   $req="select * from plante where id_plantes=?";
   $stmt=$pdo->prepare($req);
   $stmt->execute([$_GET['id_plantes']]);
   foreach ($stmt as $row) {
                    
                $desc=$row['description'].'/'.$row['nom_plantes'];;
                
                    
          }
  }

  echo $desc;

          
?>