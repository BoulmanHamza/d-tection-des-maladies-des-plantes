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



<!-- ////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////// -->
<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter Traitement</b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                         <div class="modal-body">
                <div class="form-group">
                  <label for="nomtraitment" class="col-sm-1 control-label">Nom Traitement </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="nomtraitment" name="nomtraitment" required>
                  </div>
                  <label for="photo" class="col-sm-1 control-label">Photo</label>
                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo">
                  </div>
                </div>

                <div class="form-group">
                  <label for="maladie" class="col-sm-1 control-label">maladie</label>
                  <div class="col-sm-5">
                  <select  name="maladie" id="maladie" class="form-control" required>
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
  if(!empty($_POST['nomtraitment']) && !empty($_POST['maladie'])
            && !empty($_POST['description'])  && !empty($_FILES['photo']['name'])  )
            {
              $nbrp=0;
              $reqp="select * from traitement where nom_trait=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$_POST['nomtraitment']]);
              foreach ($stmtp as $row) {
                $nbrp++;       
              }

              if($nbrp==0){

              $reqcateg="select * from maladie where nom_maladie=?";
              $stmtcateg=$pdo->prepare($reqcateg);
              $stmtcateg->execute([$_POST['maladie']]);
                    foreach ($stmtcateg as $row) {
                      $req="insert into traitement(nom_trait,description_trait
                      ,id_maladie,photo_trait) values(?,?,?,?)";
                      $stmt=$pdo->prepare($req);
                      $stmt->execute([$_POST['nomtraitment'],$_POST['description'],
                      $row['id_maladie'],$_FILES['photo']['name']]);        
                    }
                    $err='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i>insertion est bien effectuer</h4>
                      </div> '; 


              }else{
                $err='<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i>ce traitment deja existe</h4>
            </div> ';
              }

              

            }}
?>


<!-- /////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////// -->
<!-- End Add -->












<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	
  	<section class="content-header">
      <h1>
       Liste Des Traitements
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="">Traitement</li>
		<li class="active">Liste des Traitements</li>
      </ol>
    </section>







<?php
$c=0;
if(isset($_POST['sup'])){
  $sql2="delete from traitement where id_trait=?";
  $stmt2=$pdo->prepare($sql2);
  $stmt2->execute([$_POST['sup']]);
   $sql3="select * from traitement where id_trait=?";
  $stmt3=$pdo->prepare($sql3);
  $stmt3->execute([$_POST['sup']]);
  foreach ($stmt3 as $row) {
    $c++;
  }
  if($c==0){
      $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>traitement est bien supprimer</h4>
    </div> ';
  }else{
    $err='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>traitement n\'est pas supprimer</h4>
    </div> ';
    $c=0;
  }
}



if (isset($_POST['mod_t'])) {
 $id_t=$_POST['mod_t'];
 $nom_t=$_POST['nomtrait2t'];
 $des_t=$_POST['description2t'];
 $photo_t=$_FILES['photo2t']['name'];
 $maladie_t=$_POST['maladie2t'];
 $i=0;
 $nbrp=0;
              $reqp="select * from traitement  where nom_trait=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$nom_t]);
              foreach ($stmtp as $row) {
                $nbrp++;  
                $id_t2=$row['id_trait'];     

              }

             if($nbrp==0 || $id_t==$id_t2){




              $reqp="select * from maladie  where nom_maladie=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$maladie_t]);
              foreach ($stmtp as $row) {
                $nbrp++;  
                $id_m=$row['id_maladie'];     

              }

            $req='update traitement SET nom_trait="'.$nom_t.'",photo_trait="'.$photo_t.'",description_trait="'.$des_t.'",id_maladie="'.$id_m.'" WHERE id_trait="'.$_POST['mod_t'].'"';
                          $stmt=$pdo->query($req);   




              $reqtrait="select * from traitement where nom_trait=? and description_trait=? and photo_trait=? and id_maladie=?";
              $stmttrait=$pdo->prepare($reqtrait);
              $stmttrait->execute([$nom_t,$des_t,$photo_t,$id_m]);
                    foreach ($stmttrait as $row) {
                           $i++;
                    }
                    if ($i!=0) {
                      $err='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i>modification du maladie est bien effectuer </h4>
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
                  <h4><i class="icon fa fa-warning"></i>modification echoue car le traitement deja existe</h4>
            </div> ';
              }

}





?>
<?php


$tabtrait='<table id="example1" class="table table-bordered ">
          <thead>
            <th>Nom Traitement</th>
            <th>Photo Traitement</th>
            <th>Description</th>
            <th>Nom Maladie</th>
            <th>Outils</th>
          </thead>
          <tbody>';
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from maladie m ,traitement t where t.id_maladie=m.id_maladie";
          $stmt=$pdo->query($req);

          foreach ($stmt as $row) {
	          
                    $tabtrait=$tabtrait.'
                    <tr>
                    <td>'.$row['nom_trait'].'</td>
                    <td><img src="./imgBD/traitmant/'.$row['photo_trait'].'" height="30px" width="30px"/></td>
                    <td><button class="btn btn-info btn-sm edit btn-flat"  onclick="aff(this)" data-toggle="modal" data-target="#des_trait" id_trait="'.$row['id_trait'].'"><i class="fa fa-search"></i> view</button></td>
                    <td>'.$row['nom_maladie'].'</td>
                    <td>
                      <button class="btn btn-success btn-sm edit btn-flat" onclick="aff(this)" data-toggle="modal" data-target="#mod_trait" id_trait="'.$row['id_trait'].'"><i class="fa fa-edit"></i> Modifier</button>
                      <button class="btn btn-danger btn-sm delete btn-flat" onclick="aff(this)" data-toggle="modal" data-target="#sup_trait" id_trait="'.$row['id_trait'].'"><i class="fa fa-trash"></i> Supp</button>
                    </td>
                  </tr>';
           
          }
          $tabtrait=$tabtrait."</tbody></table>";



?>






<!-- Description -->
<div class="modal fade" id="des_trait">
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
             <div id="sup_trait" class="modal fade">
              <form method="post">
                  <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body">
                                <center>  <h3> Voulez-vous supprimer le traitment <span id="div_sup" style="color:red;"></span> </h3></center>
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




<!-- Modifier traitement-->
<div class="modal fade" id="mod_trait">
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
                  <label for="nomcategorie" class="col-sm-1 control-label">Nom traitement </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="nomtrait2t" name="nomtrait2t" required>
                  </div>
        
               
                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo2t" name="photo2t">
                  </div>
                </div>
                <div class="form-group">
                  <label for="maladie" class="col-sm-1 control-label">maladie</label>
                  <div class="col-sm-5">
                  <select  name="maladie2t" id="maladie2t" class="form-control" required>
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
                    <textarea id="editor2" name="description2t" rows="10" cols="140" required></textarea>
                  </div>
                  
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" value="" id="modifiert" name="mod_t"><i class="fa fa-edit"></i> Modifier</button>
            </div>
            </form> 
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////// -->
<!-- .//////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////// -->
<!-- End Modifier traitement -->














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
          echo $tabtrait;
          ?>

        </div>
      </div></div></div>
      </section>
  </div>
</div>








<!-- ajax  traitement -->
<script type="text/javascript">
function aff(val){
              var str=val.getAttribute("id_trait");
               var xmlhttp;
                          if(window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                          }else{
                            xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
                          }
                          xmlhttp.open("get","ajax/select_traitment.php?id_trait="+str,true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange=affich;

                          function affich(){

                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                              var t=xmlhttp.responseText;
                              var s_trait=t.split('./#/.');
                              var nom_t=s_trait[0];
                              var description_t=s_trait[3];
                              var nom_m=s_trait[2];
                              console.log(nom_t);
                              //description
                                  document.getElementById("des_body").innerHTML=description_t;
                                  document.getElementById("des_head").innerHTML=nom_t;
                              //suppression
                              document.getElementById("div_sup").innerHTML=nom_t;
                              var sup= document.getElementById("supprimer");
                              sup.setAttribute('value',str); 
                              //modification
                              document.getElementById("nomtrait2t").value=nom_t;
                              document.getElementById("maladie2t").value=nom_m;
                              CKEDITOR.instances["editor2"].setData(description_t);
                              var mod= document.getElementById("modifiert");
                              mod.setAttribute('value',str); 
                          
                              
                            }else{
                              document.getElementById("des_head").innerHTML="probleme de l'affichage";
                              document.getElementById("div_sup").innerHTML="probleme de l'affichage";
                            }
                          }
}


</script>
<!-- end ajax  traitement -->







<?php include 'include/script.php'; ?>


</body>
</html>