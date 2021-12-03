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
              <h4 class="modal-title"><b>Ajouter Catégorie </b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                  <label for="nomcategorie" class="col-sm-1 control-label">Nom catégorie </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="nomcategorie" name="nomcategorie" required>
                  </div>
				
               
                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo">
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
  if(!empty($_POST['nomcategorie']) && !empty($_POST['description'])  && !empty($_FILES['photo']['name'])  )
            {
              $nbr=0;
              $reqcateg="select * from categoriie where nom_categ=?";
              $stmtcateg=$pdo->prepare($reqcateg);
              $stmtcateg->execute([$_POST['nomcategorie']]);
                    foreach ($stmtcateg as $row) {
                           $nbr++; 
                    }

              if($nbr==0){
                $req="insert into categoriie(nom_categ,photo,description) values(?,?,?)";
                $stmt=$pdo->prepare($req);
                $stmt->execute([$_POST['nomcategorie'],$_FILES['photo']['name'],
                                $_POST['description']]); 
                $err='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i>insertion est bien effectuer</h4>
                      </div> '; 
              }else{
                $err='<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i>cette categorie deja existe</h4>
            </div> ';

              }
                   


            }}




?>
<!-- End Add -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////// -->












<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	
  	<section class="content-header">
      <h1>
       Listes Des Catégories Plantes 
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="">Plante</li>
		<li class="active">Catégorie des Plantes</li>
      </ol>
    </section>




<?php
$c=0;
if(isset($_POST['sup'])){
  $sql2="delete from categoriie where id_categ=?";
  $stmt2=$pdo->prepare($sql2);
  $stmt2->execute([$_POST['sup']]);
   $sql3="select * from categoriie where id_categ=?";
  $stmt3=$pdo->prepare($sql3);
  $stmt3->execute([$_POST['sup']]);
  foreach ($stmt3 as $row) {
    $c++;
  }
  if($c==0){
      $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>categorie est bien supprimer</h4>
    </div> ';
  }else{
    $err='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>categorie n\'est pas supprimer</h4>
    </div> ';
    $c=0;
  }
}






if (isset($_POST['mod_c'])) {
 $id_c=$_POST['mod_c'];
 $nom_c=$_POST['nomcategorie2c'];
 $des_c=$_POST['description2c'];
 $photo_c=$_FILES['photo2c']['name'];
 $i=0;
 $nbrp=0;
              $reqp="select * from categoriie where nom_categ=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$nom_c]);
              foreach ($stmtp as $row) {
                $nbrp++;  
                $id_c2=$row['id_categ'];     
              }

             if($nbrp==0 || $id_c==$id_c2){

            $req='update categoriie SET nom_categ="'.$nom_c.'",photo="'.$photo_c.'",description="'.$des_c.'" WHERE id_categ="'.$_POST['mod_c'].'"';
                          $stmt=$pdo->query($req);   




              $reqcateg="select * from categoriie where nom_categ=? and description=? and photo=?";
              $stmtcateg=$pdo->prepare($reqcateg);
              $stmtcateg->execute([$nom_c,$des_c,$photo_c]);
                    foreach ($stmtcateg as $row) {
                           $i++;
                    }
                    if ($i!=0) {
                      $err='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i>modification du categorie est bien effectuer </h4>
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
                  <h4><i class="icon fa fa-warning"></i>modification echoue</h4>
            </div> ';
              }

}












?>














    <?php


$tabcateg='<table id="example1" class="table table-bordered ">
          <thead>
            <th>Nom Categorie</th>
            <th>Photo Categorie</th>
            <th>Description</th>
            <th>Outils</th>
          </thead>
          <tbody>';
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from categoriie";
          $stmt=$pdo->query($req);

          foreach ($stmt as $row) {
	          
                    $tabcateg=$tabcateg.'
                    <tr>
                    <td>'.$row['nom_categ'].'</td>
                    <td><img src="./imgBD/categorie/'.$row['photo'].'" height="30px" width="30px"/></td>
                    <td><button class="btn btn-info btn-sm edit btn-flat"  onclick="aff(this)" data-toggle="modal" data-target="#des_categ" id_categ="'.$row['id_categ'].'"><i class="fa fa-search"></i> view</button></td>
                    <td>
                      <button class="btn btn-success btn-sm edit btn-flat" onclick="aff(this)" data-toggle="modal" data-target="#mod_categ" id_categ="'.$row['id_categ'].'"><i class="fa fa-edit"></i> Modifier</button>
                      <button class="btn btn-danger btn-sm delete btn-flat" onclick="aff(this)" data-toggle="modal" data-target="#sup_categ" id_categ="'.$row['id_categ'].'"><i class="fa fa-trash"></i> Supp</button>
                    </td>
                  </tr>';
           
          }
          $tabcateg=$tabcateg."</tbody></table>";



?>






<!-- Description -->
<div class="modal fade" id="des_categ">
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
             <div id="sup_categ" class="modal fade">
              <form method="post">
                  <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body">
                                <center>  <h3> Voulez-vous supprimer le categorie <span id="div_sup" style="color:red;"></span> </h3></center>
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





<!-- Modifier categorie-->
<div class="modal fade" id="mod_categ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="tet"><b>Modifier categorie</b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="form-group">
                  <label for="nomcategorie" class="col-sm-1 control-label">Nom catégorie </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="nomcategorie2" name="nomcategorie2c" required>
                  </div>
        
               
                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo2c">
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor2" name="description2c" rows="10" cols="140" required></textarea>
                  </div>
                  
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" value="" id="modifierc" name="mod_c"><i class="fa fa-edit"></i> Modifier</button>
            </div>
            </form> 
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////// -->
<!-- .//////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////// -->
<!-- End Modifier categorie -->
















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
          echo $tabcateg;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
  </div>
</div>





<!-- ajax  categorie -->
<script type="text/javascript">
function aff(val){
              var str=val.getAttribute("id_categ");
               var xmlhttp;
                          if(window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                          }else{
                            xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
                          }
                          xmlhttp.open("get","ajax/select_categ.php?id_categ="+str,true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange=affich;

                          function affich(){

                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                              var c=xmlhttp.responseText;
                              var s_categ=c.split('./#/.');
                              var nom_c=s_categ[0];
                              var description_c=s_categ[1];
                              //description
                                  document.getElementById("des_body").innerHTML=description_c;
                                  document.getElementById("des_head").innerHTML=nom_c;
                              //suppression
                              document.getElementById("div_sup").innerHTML=nom_c;
                              var sup= document.getElementById("supprimer");
                              sup.setAttribute('value',str); 
                              //modification
                              document.getElementById("nomcategorie2").value=nom_c;
                              CKEDITOR.instances["editor2"].setData(description_c);
                              var mod= document.getElementById("modifierc");
                              mod.setAttribute('value',str); 
                          
                              
                            }else{
                              document.getElementById("des_head").innerHTML="probleme de l'affichage";
                              document.getElementById("div_sup").innerHTML="probleme de l'affichage";
                            }
                          }
}


</script>
<!-- end ajax  categorie -->






<?php include 'include/script.php'; ?>


</body>
</html>