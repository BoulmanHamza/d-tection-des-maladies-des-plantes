<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}
$email=$_SESSION['admin'];
$req="select * from admin where Email=?";
$stmt=$pdo->prepare($req);
$stmt->execute([$email]);

foreach ($stmt as $row) {
  $nom=$row['Nom'];
  $prenom=$row['Prenom'];
  $password=$row['password'];
  $id_admin=$row['id'];
  $date_member=$row['date_member'];
}


?>


<?php

$err="";
if (isset($_POST['deco'])){
  unset($_SESSION['admin']);
  echo '<script>
	window.location="login.php";
	  </script>';
}

if (isset($_POST['modifier'])){
   $nom1=$_POST['Nom'];
   $prenom1=$_POST['prenom'];
   $email1=$_POST['Email'];
   $oldpass1=$_POST['oldpass'];
   $newpass1=$_POST['newpass'];
   $reppass1=$_POST['reppass'];
   try {
    $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
  } catch (Exception $e) {
    echo $e->getMessage();
  }



  if($oldpass1 == $password){
    if(empty($newpass1) || empty($reppass1) ){
      $req='update admin SET Email="'.$email1.'",Prenom="'.$prenom1.'",Nom="'.$nom1.'" WHERE Email="'.$_SESSION['admin'].'"';
      $stmt=$pdo->query($req);
      $_SESSION['admin']=$email1;
      $nom=$nom1;
      $prenom=$prenom1;
      $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> le profil est  changer</h4>
    </div> ';
     }elseif(!empty($newpass1) && !empty($reppass1)){
      if ($newpass1 != $reppass1) {
        $err='<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i> confirmation password est incorect</h4>
                </div> ';
      }else{
      $req='update admin SET Email="'.$email1.'",password="'.$newpass1.'",Prenom="'.$prenom1.'",Nom="'.$nom1.'" WHERE Email="'.$_SESSION['admin'].'"';
      $stmt=$pdo->query($req);
      $_SESSION['admin']=$email1;
      $nom=$nom1;
      $prenom=$prenom1;
      $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> le profil est bien changer</h4>
    </div> ';
    }
  }
  }else{
      $err='<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> old password est incorect le profil n\'est pas changer</h4>
            </div> ';
  }
}

?>



<div class="modal fade" id="modifierprofile">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Modifier Profile</b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                  <label for="Nom" class="col-sm-3 control-label">Nom : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $nom?>" required >
                  </div>
                </div>
                 <div class="form-group">
				          <label for="prenom" class="col-sm-3 control-label">Prenom : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $prenom?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Email" class="col-sm-3 control-label">Email : </label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $email?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="newpass" class="col-sm-3 control-label">New password (facultatif) :</label>
                  <div class="col-sm-9">
                    <input type="password" placeholder="***********" class="form-control" id="newpass" name="newpass">
                  </div>
                </div>
                <div class="form-group">
                  <label for="reppass" class="col-sm-3 control-label">confirme Password (facultatif) : </label>
                  <div class="col-sm-9">
                    <input type="password" placeholder="***********" class="form-control" id="reppass" name="reppass" >
                  </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="form-group">
                  <label for="oldpass" class="col-sm-3 control-label">Current Password : </label>
                  <div class="col-sm-9">
                    <input type="password"  placeholder="***********" class="form-control" id="oldpass" name="oldpass" required>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit"  class="btn btn-primary btn-flat" name="modifier"><i class="fa fa-edit"></i>Modifier</button>
            </div>
            </form> 
        </div>
    </div>
</div>