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
              <h4 class="modal-title"><b>Ajouter Maladie</b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
             <div class="modal-body">
                <div class="form-group">
                  <label for="nommaladie" class="col-sm-1 control-label">Nom Maladie </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="nommaladie" name="nommaladie" required>
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
  if(!empty($_POST['nommaladie']) && !empty($_POST['description'])  && !empty($_FILES['photo']['name'])  )
            {
              $nbr=0;
              $reqcateg="select * from maladie where nom_maladie=?";
              $stmtcateg=$pdo->prepare($reqcateg);
              $stmtcateg->execute([$_POST['nommaladie']]);
                    foreach ($stmtcateg as $row) {
                           $nbr++; 
                    }
              if($nbr==0){
                $req="insert into maladie(nom_maladie,photo,description_maladie) values(?,?,?)";
                $stmt=$pdo->prepare($req);
                $stmt->execute([$_POST['nommaladie'],$_FILES['photo']['name'],
                                $_POST['description']]); 
                $err='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i>insertion est bien effectuer</h4>
                      </div> '; 
              }else{
                $err='<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i>cette maladie deja existe</h4>
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
		Liste Des Maladies
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="">Maladie</li>
		<li class="active">Liste des Maladies</li>
      </ol>
    </section>



<?php
$c=0;
if(isset($_POST['sup'])){
  $sql2="delete from maladie where id_maladie=?";
  $stmt2=$pdo->prepare($sql2);
  $stmt2->execute([$_POST['sup']]);
   $sql3="select * from maladie where id_maladie=?";
  $stmt3=$pdo->prepare($sql3);
  $stmt3->execute([$_POST['sup']]);
  foreach ($stmt3 as $row) {
    $c++;
  }
  if($c==0){
      $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>maladie est bien supprimer</h4>
    </div> ';
  }else{
    $err='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>maladie n\'est pas supprimer</h4>
    </div> ';
    $c=0;
  }
}


if (isset($_POST['mod_m'])) {
 $id_m=$_POST['mod_m'];
 $nom_m=$_POST['nommaladie2m'];
 $des_m=$_POST['description2m'];
 $photo_m=$_FILES['photo2m']['name'];
 $i=0;
 $nbrp=0;
              $reqp="select * from maladie where nom_maladie=?";
              $stmtp=$pdo->prepare($reqp);
              $stmtp->execute([$nom_m]);
              foreach ($stmtp as $row) {
                $nbrp++;  
                $id_m2=$row['id_maladie'];     
              }

             if($nbrp==0 || $id_m==$id_m2){

            $req='update maladie SET nom_maladie="'.$nom_m.'",photo="'.$photo_m.'",description_maladie="'.$des_m.'" WHERE id_maladie="'.$_POST['mod_m'].'"';
                          $stmt=$pdo->query($req);   




              $reqcateg="select * from maladie where nom_maladie=? and description_maladie=? and photo=?";
              $stmtcateg=$pdo->prepare($reqcateg);
              $stmtcateg->execute([$nom_m,$des_m,$photo_m]);
                    foreach ($stmtcateg as $row) {
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
                  <h4><i class="icon fa fa-warning"></i>cette maladie deja existe</h4>
            </div> ';
              }

}








?>

    <?php


$tabmaladie='<table id="example1" class="table table-bordered ">
          <thead>
            <th>Nom Maladie</th>
            <th>Photo Maladie</th>
            <th>Description</th>
            <th>Outils</th>
          </thead>
          <tbody>';
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from maladie";
          $stmt=$pdo->query($req);

          foreach ($stmt as $row) {
	          
                    $tabmaladie=$tabmaladie.'
                    <tr>
                    <td>'.$row['nom_maladie'].'</td>
                    <td><img src="./imgBD/maladie/'.$row['photo'].'" height="30px" width="30px"/></td>
                    <td><button class="btn btn-info btn-sm edit btn-flat"  onclick="aff(this)" data-toggle="modal" data-target="#des_maladie" id_maladie="'.$row['id_maladie'].'"><i class="fa fa-search"></i> view</button></td>
                    <td>
                      <button class="btn btn-success btn-sm edit btn-flat" onclick="aff(this)" data-toggle="modal" data-target="#mod_maladie" id_maladie="'.$row['id_maladie'].'"><i class="fa fa-edit"></i> Modifier</button>
                      <button class="btn btn-danger btn-sm delete btn-flat" onclick="aff(this)" data-toggle="modal" data-target="#sup_maladie" id_maladie="'.$row['id_maladie'].'"><i class="fa fa-trash"></i> Supp</button>
                    </td>
                  </tr>';
           
          }
          $tabmaladie=$tabmaladie."</tbody></table>";



?>





<!-- Description -->
<div class="modal fade" id="des_maladie">
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

<!-- modal sup maladie -->
             <div class="modal fade" id="sup_maladie" >
              <form method="post">
                  <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body">
                                <center>  <h3> Voulez-vous supprimer maladie <span id="div_sup" style="color:red;"></span> </h3></center>
                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                 <button type="submit" value="" id="supprimer" class="btn btn-danger delete btn-flat" name="sup"><i class="fa fa-trash"></i> Supprimer </button>
                        </div>

                        </div>
                 </div>
                 </form>
           </div>
<!-- End modal sup maladie -->





<!-- Modifier maladie-->
<div class="modal fade" id="mod_maladie">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="tet"><b>Modifier maladie</b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="form-group">
                  <label for="nomcategorie" class="col-sm-1 control-label">Nom maladie </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="nommaladie2m" name="nommaladie2m" required>
                  </div>
        
               
                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo2m" required>
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor2" name="description2m" rows="10" cols="140" required></textarea>
                  </div>
                  
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" value="" id="modifierm" name="mod_m"><i class="fa fa-edit"></i> Modifier</button>
            </div>
            </form> 
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////// -->
<!-- .//////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////// -->
<!-- End Modifier maladie -->






















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
          echo $tabmaladie;
          ?>  
          </div>     	
        </div>
    </div>
</div>
</section>
  </div>
</div>



<!-- ajax  maladie -->
<script type="text/javascript">
function aff(val){
              var str=val.getAttribute("id_maladie");
               var xmlhttp;
                          if(window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                          }else{
                            xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
                          }
                          xmlhttp.open("get","ajax/select_maladie.php?id_maladie="+str,true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange=affich;

                          function affich(){

                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                              var m=xmlhttp.responseText;
                              var s_maladie=m.split('./#/.');
                              var nom_m=s_maladie[0];
                              var description_m=s_maladie[2];
                     
                              //description
                                  document.getElementById("des_body").innerHTML=description_m;
                                  document.getElementById("des_head").innerHTML=nom_m;
                              //suppression
                              document.getElementById("div_sup").innerHTML=nom_m;
                              var sup= document.getElementById("supprimer");
                              sup.setAttribute('value',str); 
                              //modification
                              document.getElementById("nommaladie2m").value=nom_m;
                              CKEDITOR.instances["editor2"].setData(description_m);
                              var mod= document.getElementById("modifierm");
                              mod.setAttribute('value',str); 
                          
                              
                            }else{
                              document.getElementById("des_head").innerHTML="probleme de l'affichage";
                              document.getElementById("div_sup").innerHTML="probleme de l'affichage";
                            }
                          }
}


</script>
<!-- end ajax  maladie -->



<?php include 'include/script.php'; ?>

</body>
</html>