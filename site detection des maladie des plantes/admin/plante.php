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


<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////// -->
<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter Plante</b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                  <label for="nomplante" class="col-sm-2 control-label">Nom Plante </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="nomplante" name="nomplante" required>
                  </div>
                <label for="ref" class="col-sm-2 control-label">Réference Plante </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="ref" name="ref" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="py" class="col-sm-2 control-label">Pays Mère </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="py" name="py" required>
                  </div>
                  <label for="photo" class="col-sm-2 control-label">Photo</label>
                  <div class="col-sm-4">
                    <input type="file" id="photo" name="photo">
                  </div>
                </div>
                <div class="form-group">
                <label for="region" class="col-sm-2 control-label">region </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="region" name="region" required>
                  </div>
                  <label for="categorie" class="col-sm-2 control-label">categorie</label>
                  <div class="col-sm-4">
                  <select  name="categorie" id="categorie" class="form-control" required>
                      <option value="" hidden="">categorie</option>
                      <?php
                             try {
                              $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
                            } catch (Exception $e) {
                              echo $e->getMessage();
                            }
                            $req="select * from categoriie";
                            $stmt=$pdo->query($req);
                            foreach ($stmt as $row) {
                              echo '<option>'.$row['nom_categ'].'</option>';
                            }
                      ?>
                  </select>
                  </div>
                </div>
                 <div class="form-group">
               
                  <label for="plante_m" class="col-sm-2 control-label">Plante Medicine</label>
                  <div class="col-sm-4">
                  <select  name="plante_m" id="plante_m" class="form-control" required>
                      <option>Non</option>
                      <option>Oui</option>
                      
                  </select>
                  </div>
                </div>
                
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="description" rows="10" cols="140" required></textarea>
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
  if(!empty($_POST['nomplante']) && !empty($_POST['py']) 
            && !empty($_POST['ref']) && !empty($_POST['categorie']) && !empty($_POST['region'])
            && !empty($_POST['description'])  && !empty($_FILES['photo']['name'])  )
            {
              $nbrp=0;
              $reqp="select * from plante where nom_plantes=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$_POST['nomplante']]);
              foreach ($stmtp as $row) {
                $nbrp++;       
              }

              if($nbrp==0){

                $id_categorie="";
              $reqcateg="select * from categoriie where nom_categ=?";
              $stmtcateg=$pdo->prepare($reqcateg);
              $stmtcateg->execute([$_POST['categorie']]);
                    foreach ($stmtcateg as $row) {
                      $req="insert into plante(nom_plantes,reference_plantes,pays_mere,photo_plante
                      ,description,id_categorie,region,plante_Medicine) values(?,?,?,?,?,?,?,?)";
                      $stmt=$pdo->prepare($req);
                      $stmt->execute([$_POST['nomplante'],$_POST['ref'],
                                      $_POST['py'],$_FILES['photo']['name'],
                                      $_POST['description'],$row['id_categ'],$_POST['region'],$_POST['plante_m']]);        
                    }
                    $err='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i>insertion est bien effectuer</h4>
                      </div> '; 


              }else{
                $err='<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i>cette plante deja existe</h4>
            </div> ';
              }

              

            }}
?>

<!-- End Add -->
<!-- ///////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////// -->















<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	
  	<section class="content-header">
      <h1>
       Listes Des Plantes 
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="">Plante</li>
		<li class="active">liste des Plantes</li>
      </ol>
    </section>



















<?php
$c=0;
if(isset($_POST['sup'])){
  $sql2="delete from plante where id_plantes=?";
  $stmt2=$pdo->prepare($sql2);
  $stmt2->execute([$_POST['sup']]);
   $sql3="select * from plante where id_plantes=?";
  $stmt3=$pdo->prepare($sql3);
  $stmt3->execute([$_POST['sup']]);
  foreach ($stmt3 as $row) {
    $c++;
  }
  if($c==0){
      $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>plante est bien supprimer</h4>
    </div> ';
  }else{
    $err='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>plante n\'est pas supprimer</h4>
    </div> ';
    $c=0;
  }
}




if (isset($_POST['mod_p'])) {
 $id_p=$_POST['mod_p'];
 $nom_p=$_POST['nom2p'];
 $ref_p=$_POST['ref2p'];
 $pay_p=$_POST['py2p'];
 $categ_p=$_POST['categorie2p'];
 $region_p=$_POST['region2p'];
 $photo_p=$_FILES['photo2p']['name'];
 $desc_p=$_POST['description2p'];
 $plant_mp=$_POST['plante_mp'];
 $nbrp=0;
              $reqp="select * from plante where nom_plantes=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$nom_p]);
              foreach ($stmtp as $row) {
                $nbrp++;  
                $id_p2=$row['id_plantes'];     
              }

             if($nbrp==0 || $id_p2==$id_p){

            
              $reqcateg="select * from categoriie where nom_categ=?";
              $stmtcateg=$pdo->prepare($reqcateg);
              $stmtcateg->execute([$categ_p]);
                    foreach ($stmtcateg as $row) {

                          $req='update plante SET nom_plantes="'.$nom_p.'",reference_plantes="'.$ref_p.'",pays_mere="'.$pay_p.'",photo_plante="'.$photo_p.'", id_categorie="'.$row['id_categ'].'",region="'.$region_p.'",description="'.$desc_p.'",plante_Medicine="'.$plant_mp.'" WHERE id_plantes="'.$_POST['mod_p'].'"';
                          $stmt=$pdo->query($req);    
                    }
                    $err='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i>modification du plante est bien effectuer </h4>
                      </div> '; 

              }else{
                $err='<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i>modification echoue</h4>
            </div> ';
              }

}




?>



    <?php


$tabplant='<table id="example1" class="table table-bordered ">
          <thead>
            <th>Nom Plante</th>
            <th>Photo Plante</th>
            <th>Description</th>
            <th>categorie</th>
             <th>plante Medicine</th>
            <th>reference</th>
            <th>Outils</th>
          </thead>
          <tbody>';
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from plante ,categoriie   where id_categorie=id_categ";
          $stmt=$pdo->query($req);

          foreach ($stmt as $row) {
	          
                    $tabplant=$tabplant."
                    <tr>
                    <td>".$row['nom_plantes']."</td>
                    <td><img src='./imgBD/plante/".$row['photo_plante']."' height='30px' width='30px'/></td>
                    <td><button class='btn btn-info btn-sm edit btn-flat' data-toggle='modal' onclick='aff(this)' id_plante='".$row['id_plantes']."' data-target='#description'  ><i class='fa fa-search'></i> view</button> </td>
                    <td>".$row['nom_categ']."</td>
                    <td>".$row['plante_Medicine']."</td>
                    <td>".$row['reference_plantes']."</td>
                    <td>  
                      <button class='btn btn-success btn-sm edit btn-flat' onclick='aff(this)' data-toggle='modal' data-target='#mod_plante' id_plante='".$row['id_plantes']."'><i class='fa fa-edit'></i> Modifier</button>      
                      <button class='btn btn-danger btn-sm delete btn-flat' data-toggle='modal' onclick='aff(this)' data-target='#sup_plante' id_plante='".$row['id_plantes']."'><i class='fa fa-trash'></i> Supp</button>
                      </td>
                  </tr>";
          }
          $tabplant=$tabplant."</tbody></table>";

?>





<!-- Description -->
<div class="modal fade" id="description">
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
<!-- end Description -->





<!-- modal sup plante -->
             <div id="sup_plante" class="modal fade">
              <form method="post">
                  <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body">
                                <center>  <h3> Voulez-vous supprimer le plante <span id="div_sup" style="color:red;"></span> </h3></center>
                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                 <button type="submit" value="" id="supprimer" class="btn btn-danger delete btn-flat" name="sup"><i class="fa fa-trash"></i> Supprimer </button>
                        </div>

                        </div>
                 </div>
                 </form>
           </div>
<!-- End modal sup_plante -->



<!-- //////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////// -->
<!-- Modifier Plante -->
<div class="modal fade" id="mod_plante">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="tet"><b>Modifier Plante</b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
            
                <div class="form-group">
                  <label for="nomplante" class="col-sm-2 control-label">Nom Plante </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="nom2p" name="nom2p" required>
                  </div>
                <label for="ref" class="col-sm-2 control-label">Réference Plante </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="ref2p" name="ref2p" required>
                  </div>
                </div>        
                <div class="form-group">
                  <label for="py" class="col-sm-2 control-label">Pays Mère </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="py2p" name="py2p" required>
                  </div>
                  <label for="photo" class="col-sm-2 control-label">Photo</label>
                  <div class="col-sm-4">
                    <input type="file" id="photo2p" name="photo2p" required>
                  </div>
                </div>
                <div class="form-group">
                <label for="region" class="col-sm-2 control-label">region </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="region2p" name="region2p" required>
                  </div>
                  <label for="categorie" class="col-sm-2 control-label">categorie</label>
                  <div class="col-sm-4">
                  <select  name="categorie2p" id="categorie2p" class="form-control" required>
                      <option value=""  hidden="">categorie</option>
                      <?php
                             try {
                              $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
                            } catch (Exception $e) {
                              echo $e->getMessage();
                            }
                            $req="select * from categoriie";
                            $stmt=$pdo->query($req);
                            foreach ($stmt as $row) {
                              echo '<option>'.$row['nom_categ'].'</option>';
                            }
                      ?>
                  </select>
                  </div>
                </div>


                <div class="form-group">
                  <label for="plante_mp" class="col-sm-2 control-label">categorie</label>
                  <div class="col-sm-4">
                  <select  name="plante_mp" id="plante_mp" class="form-control" required>
                      <option>Non</option>
                       <option>Oui</option>
                  </select>
                  </div>
                </div>



                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor2" name="description2p" rows="10" cols="140" required></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" value="" id="modifierp" name="mod_p"><i class="fa fa-edit"></i> Modifier</button>
            </div>
            </form> 
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////// -->
<!-- .//////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////// -->
<!-- End Modifier Plant -->






    <section class="content">
    <?php echo $err?>
      <div class="row" id="tabp">
        <div class="col-xs-12">
          <div class="box">
      <div class="box-header with-border">
              <button data-toggle="modal" data-target="#addnew" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</button>
      </div> 
       <div class="box-body">
          <?php
          echo $tabplant;
          ?>  
        </div>
        </div>
      </div>
      </div>
    </section>
  </div>
</div>




<!-- ajax  plante -->
<script type="text/javascript">
function aff(val){
              var str=val.getAttribute("id_plante");
               var xmlhttp;
                          if(window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                          }else{
                            xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
                          }
                          xmlhttp.open("get","ajax/select_plante.php?id_plante="+str,true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange=affich;

                          function affich(){

                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                              var p=xmlhttp.responseText;
                              var s_plante=p.split('./#/.');
                              var nomp=s_plante[0];
                              var refp=s_plante[1];
                              var payep=s_plante[2];
                              var photop=s_plante[3];
                              var catp=s_plante[4];
                              var regionp=s_plante[5];
                              var plante_mp=s_plante[6];
                              var descriptionp=s_plante[7];
                              //description
                              document.getElementById("des_body").innerHTML=descriptionp;
                              document.getElementById("des_head").innerHTML=nomp;
                              //suppression
                              document.getElementById("div_sup").innerHTML=nomp;
                              var sup= document.getElementById("supprimer");
                              sup.setAttribute('value',str); 
                              //modification
                              document.getElementById("nom2p").value=nomp;
                              document.getElementById("ref2p").value=refp;
                              document.getElementById("py2p").value=payep;
                              document.getElementById("categorie2p").value=catp;
                              document.getElementById("plante_mp").value=plante_mp;
                              document.getElementById("region2p").value=regionp;
                               CKEDITOR.instances["editor2"].setData(descriptionp);
                              // document.getElementById("photo2p").value=nomp;
                              var mod= document.getElementById("modifierp");
                              mod.setAttribute('value',str); 
                           
                              
                            }else{
                              document.getElementById("des_head").innerHTML="probleme de l'affichage";
                            }
                          }
}


</script>
<!-- end ajax  plante -->




<?php include 'include/script.php'; ?>



</body>
</html>