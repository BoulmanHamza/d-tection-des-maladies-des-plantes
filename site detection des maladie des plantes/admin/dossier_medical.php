<?php
session_start();
if(empty($_SESSION['admin'])){
  header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SMART AGRICULTURE</title>
       <?php include 'include/style.php'; ?>
  </head>

<?php include 'include/modifier_profile.php'; ?>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	
	<?php include 'include/navbar.php'; ?>
 <?php include 'include/menu.php'; ?>










<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter Dossier Medicale</b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                  <label for="plante" class="col-sm-2 control-label">Nom plante</label>
                  <div class="col-sm-4">
                  <select  name="nom_plante" id="nom_plante" class="form-control" required>
                      <option value="" hidden="">plante</option>
                      <?php
                             try {
                              $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
                            } catch (Exception $e) {
                              echo $e->getMessage();
                            }
                            $req="select * from plante";
                            $stmt=$pdo->query($req);
                            foreach ($stmt as $row) {
                              echo '<option>'.$row['nom_plantes'].'</option>';
                            }
                      ?>
                  </select>
                  </div>
        
               
                  <label for="nom_maladie" class="col-sm-2 control-label">Nom maladie</label>
                  <div class="col-sm-4">
                  <select  name="nom_maladie" id="nom_maladie" class="form-control" required>
                      <option value="" hidden="">maladie</option>
                      <?php
                             try {
                              $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
                            } catch (Exception $e) {
                              echo $e->getMessage();
                            }
                            $req="select * from maladie";
                            $stmt=$pdo->query($req);
                            foreach ($stmt as $row) {
                              echo '<option>'.$row['nom_maladie'].'</option>';
                            }
                      ?>
                  </select>
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="descriptiond" rows="10" cols="140" required></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
            </div>
            </form> 
        </div>
    </div>
</div>





<?php




if(isset($_POST['add'])){

  $i=0;
 
              $nbrp=0;
              $reqp="select * from dossier_medicale d,plante p ,maladie m where p.id_plantes=d.id_plantes and d.id_maladie=m.id_maladie and nom_plantes=? and nom_maladie=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$_POST['nom_plante'],$_POST['nom_maladie']]);
              foreach ($stmtp as $row) {
                $nbrp++;      
              }

              if($nbrp==0){

              $reqm="select * from maladie where nom_maladie=?";
              $stmtm=$pdo->prepare($reqm);
              $stmtm->execute([$_POST['nom_maladie']]);
                    foreach ($stmtm as $row) {
                           $m=$row['id_maladie'];  
                    }
              $reqp="select * from plante where nom_plantes=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$_POST['nom_plante']]);
                    foreach ($stmtp as $row) {
                           $p=$row['id_plantes'];  
                    }
                      $today=date('Y-m-d');
                     $req="insert into dossier_medicale(description_dossier,date_dossier
                      ,id_maladie,id_plantes) values(?,?,?,?)";
                      $stmt=$pdo->prepare($req);

                      $stmt->execute([$_POST['descriptiond'],$today,$m,$p]);

                    $err='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i>insertion est bien effectuer</h4>
                      </div> '; 


              }else{
                $err='<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i>ce dossier deja existe</h4>
            </div> ';
              }

              

            }
?>



<!-- End Add -->












<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	
  	<section class="content-header">
      <h1>
       Dossier Medicale
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="#">Dossier Medicale</li>
		<li class="active">Dossier Medicale</li>
      </ol>
    </section>



<?php
$c=0;
if(isset($_POST['sup'])){
  $sql2="delete from dossier_medicale where id_dossier=?";
  $stmt2=$pdo->prepare($sql2);
  $stmt2->execute([$_POST['sup']]);
   $sql3="select * from dossier_medicale where id_dossier=?";
  $stmt3=$pdo->prepare($sql3);
  $stmt3->execute([$_POST['sup']]);
  foreach ($stmt3 as $row) {
    $c++;
  }
  if($c==0){
      $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>Dossier est bien supprimer</h4>
    </div> ';
  }else{
    $err='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>Dossier n\'est pas supprimer</h4>
    </div> ';
    $c=0;
  }
}



if (isset($_POST['mod_d'])) {





 $id_d=$_POST['mod_d'];
 $nom_p=$_POST['nomtrait2d'];
 $des_d=$_POST['description2d'];
 $nom_m=$_POST['maladie2d'];
 $i=0;
 $nbrp=0;
            $reqp="select * from dossier_medicale d,plante p ,maladie m where p.id_plantes=d.id_plantes and d.id_maladie=m.id_maladie  and nom_plantes=? and nom_maladie=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$nom_p,$nom_m]);
              foreach ($stmtp as $row) {
                $nbrp++;
              }
                                                $reqm="select * from maladie  where nom_maladie=?";
                                                $stmtm=$pdo->prepare($reqm);
                                                $stmtm->execute([$nom_m]);
                                                foreach ($stmtm as $row) {
                                                 
                                                  $id_m=$row['id_maladie'];  
                                                 // $nom_m2=$row['nom_maladie'];   

                                                }

                                                $reqp="select * from plante  where nom_plantes=?";
                                                $stmtp=$pdo->prepare($reqp);
                                                $stmtp->execute([$nom_p]);
                                                foreach ($stmtp as $row) {
                                            
                                                  $id_p=$row['id_plantes'];   
                                                //  $nom_p2=$row['nom_plantes'];  

                                                }


$reqp="select * from dossier_medicale d,plante p ,maladie m where p.id_plantes=d.id_plantes and d.id_maladie=m.id_maladie and id_dossier=? ";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$_POST['mod_d']]);
              foreach ($stmtp as $row) {
                $nom_m2=$row['nom_maladie'];
                $nom_p2=$row['nom_plantes'];

              }


             if($nbrp==0 || ($nom_m2==$nom_m && $nom_p2==$nom_p)){
            $today=date('Y-m-d');

            $req='update dossier_medicale SET id_plantes="'.$id_p.'",id_maladie="'.$id_m.'",description_dossier="'.$des_d.'",date_dossier="'.$today.'" WHERE id_dossier="'.$_POST['mod_d'].'"';
                          $stmt=$pdo->query($req);   




              $reqtrait="select * from dossier_medicale where id_plantes=? and description_dossier=? and date_dossier=? and id_maladie=?";
              $stmttrait=$pdo->prepare($reqtrait);
              $stmttrait->execute([$id_p,$des_d,$today,$id_m]);
                    foreach ($stmttrait as $row) {
                           $i++;
                    }
                    if ($i!=0) {
                      $err='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i>modification de dossier est bien effectuer </h4>
                      </div> '; 
                    } else {
                       $err='<div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <h4><i class="icon fa fa-warning"></i>modification echoue</h4>
                         </div> ';
                    }
                    
                   

              }else{
                $err='<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i>modification echoue car le dossier deja existe</h4>
            </div> ';
              }

}




?>







<?php


$tabdossier='<table id="example1" class="table table-bordered ">
          <thead>
            <th>Nom Plante</th>
            <th>Nom maladie</th>
            <th>Description</th>
            <th>date_dossier</th>
            <th>Outils</th>
          </thead>
          <tbody>';
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from dossier_medicale d,plante p ,maladie m where p.id_plantes=d.id_plantes and d.id_maladie=m.id_maladie";
          $stmt=$pdo->query($req);

          foreach ($stmt as $row) {
            
                    $tabdossier=$tabdossier.'
                    <tr>
                    <td>'.$row['nom_plantes'].'</td>
                    <td>'.$row['nom_maladie'].'</td>
                    <td><button class="btn btn-info btn-sm edit btn-flat"  onclick="aff(this)" data-toggle="modal" data-target="#des_dossier" id_dossier="'.$row['id_dossier'].'"><i class="fa fa-search"></i> view</button></td>
                    <td>'.$row['date_dossier'].'</td>
                    <td>
                      <button class="btn btn-success btn-sm edit btn-flat" onclick="aff(this)" data-toggle="modal" data-target="#mod_dossier" id_dossier="'.$row['id_dossier'].'"><i class="fa fa-edit"></i> Modifier</button>
                      <button class="btn btn-danger btn-sm delete btn-flat" onclick="aff(this)" data-toggle="modal" data-target="#sup_dossier" id_dossier="'.$row['id_dossier'].'"><i class="fa fa-trash"></i> Supp</button>
                    </td>
                  </tr>';
           
          }
          $tabdossier=$tabdossier."</tbody></table>";



?>



      
<!-- Description -->
<div class="modal fade" id="des_dossier">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name" id="des_head"></span></b></h4>
            </div>
            <div class="modal-body">
              Description :
              <br><br> 
                <p id="des_body"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end description -->



<!-- modal sup categorie -->
             <div id="sup_dossier" class="modal fade">
              <form method="post">
                  <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body">
                                <center>  <h3> Voulez-vous supprimer le  <span id="div_sup" style="color:red;"></span> </h3></center>
                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                 <button type="submit" value="" id="supprimer" class="btn btn-danger delete btn-flat" name="sup"><i class="fa fa-trash"></i> Supprimer </button>
                        </div>

                        </div>
                 </div>
                 </form>
           </div>
<!-- End modal sup categorie -->



<!-- Modifier dossier-->
<div class="modal fade" id="mod_dossier">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="tet"><b>Modifier traitement</b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="form-group">
                  <label for="nomtrait2d" class="col-sm-2 control-label">Nom plante </label>
                  <div class="col-sm-4">
                    <select  name="nomtrait2d" id="nomtrait2d" class="form-control" required>
                      <option value="" hidden="">maladie</option>
                      <?php
                             try {
                              $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
                            } catch (Exception $e) {
                              echo $e->getMessage();
                            }
                            $req="select * from plante";
                            $stmt=$pdo->query($req);
                            foreach ($stmt as $row) {
                              echo '<option>'.$row['nom_plantes'].'</option>';
                            }
                      ?>
                  </select>
                  </div>
        
               
                  <label for="maladie2d" class="col-sm-2 control-label">Nom maladie</label>
                  <div class="col-sm-4">
                  <select  name="maladie2d" id="maladie2d" class="form-control" required>
                      <option value="" hidden="">maladie</option>
                      <?php
                             try {
                              $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
                            } catch (Exception $e) {
                              echo $e->getMessage();
                            }
                            $req="select * from maladie";
                            $stmt=$pdo->query($req);
                            foreach ($stmt as $row) {
                              echo '<option>'.$row['nom_maladie'].'</option>';
                            }
                      ?>
                  </select>
                  </div>
                </div>
                
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor2" name="description2d" rows="10" cols="140" required></textarea>
                  </div>
                  
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" value="" id="modifierd" name="mod_d"><i class="fa fa-edit"></i> Modifier</button>
            </div>
            </form> 
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////// -->
<!-- .//////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////// -->
<!-- End Modifier dossier -->







  







    <section class="content">
    <?php echo $err?>
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
      <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            
        <div class="box-body">
          
          <?php
          echo $tabdossier;
          ?>

        </div>
      </div></div></div>
      </section>
  </div>
</div>
  </div>
</div>




<!-- ajax  plante -->
<script type="text/javascript">
function aff(val){
              var str=val.getAttribute("id_dossier");
               var xmlhttp;
                          if(window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                          }else{
                            xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
                          }
                          xmlhttp.open("get","ajax/select_dossier.php?id_dossier="+str,true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange=affich;

                          function affich(){

                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                              var d=xmlhttp.responseText;
                              var s_dossier=d.split('./#/.');
                              var nom_p=s_dossier[0];
                              var nom_m=s_dossier[1];
                              var description_d=s_dossier[2];
                              var date_d=s_dossier[3];
                              
                              //description
                                  document.getElementById("des_head").innerHTML="id_Dossier : "+str;
                                  document.getElementById("des_body").innerHTML=description_d;
                              //suppression
                              document.getElementById("div_sup").innerHTML="Dossier : "+str;
                              var sup= document.getElementById("supprimer");
                              sup.setAttribute('value',str); 
                              //modification
                              document.getElementById("nomtrait2d").value=nom_p;
                              document.getElementById("maladie2d").value=nom_m;
                              CKEDITOR.instances["editor2"].setData(description_d);
                              var mod= document.getElementById("modifierd");
                              mod.setAttribute('value',str); 
                          
                              
                            }else{
                              document.getElementById("des_head").innerHTML="probleme de l'affichage";
                              document.getElementById("div_sup").innerHTML="probleme de l'affichage";
                            }
                          }
}


</script>
<!-- end ajax  plante -->





<?php include 'include/script.php'; ?>


</body>
</html>