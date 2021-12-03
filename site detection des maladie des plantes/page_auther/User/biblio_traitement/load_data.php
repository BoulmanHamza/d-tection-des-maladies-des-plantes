<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
   } catch (Exception $e) {
  echo $e->getMessage();
   }
$perPage = 12;
if (isset($_POST["pages"])) { 
	$page  = $_POST["pages"]; 
} else { 
	$page=1; 
};  
$startFrom = ($page-1) * $perPage; 
  
$req= "SELECT * FROM traitement ORDER BY id_trait ASC LIMIT $startFrom, $perPage";  
$stmt = $pdo->query($req); 
$paginationHtml = '<div class="row">';
foreach ($stmt as $row) {
 	  
	$paginationHtml.='<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="../../../admin/imgBD/traitmant/'.$row['photo_trait'].'" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <h5>'.$row['nom_trait'].'</h5>
                                   <button class="blog__btn" name="readmore" value="'.$row['nom_trait'].'">Lire plus <span class="fa fa-arrow-right"></span></button>
                                </div>
                            </div>
                        </div>';
	
	
} 
$paginationHtml.='</div>';
$jsonData = array(
	"html"	=> $paginationHtml,	
);
echo json_encode($jsonData); 
?>