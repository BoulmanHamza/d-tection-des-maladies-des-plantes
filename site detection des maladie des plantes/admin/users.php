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





<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	
  	<section class="content-header">
      <h1>
       Liste Des Utilisateurs
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="#">USER</li>
		<li class="active">Liste des Utilisateurs</li>
      </ol>
    </section>



<?php
if(isset($_POST['act'])){
  $act=$_POST['act'];
  $req='update compte SET status_compte= "0" WHERE id_user="'.$act.'"';
  $stmt=$pdo->query($req);
  $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> le compte est activer</h4>
    </div> ';
}
if(isset($_POST['des'])){
  $des=$_POST['des'];
  $req='update compte SET status_compte= "1" WHERE id_user="'.$des.'"';
  $stmt=$pdo->query($req);
  $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> le compte est desactiver</h4>
    </div> ';
}

if(isset($_POST['sup'])){
  $sup=$_POST['sup'];
  $req='delete from compte WHERE id_user="'.$sup.'"';
  $stmt=$pdo->query($req);
  $req2='delete from user WHERE id_user="'.$sup.'"';
  $stmt2=$pdo->query($req2);
  $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>User est bien supprimer</h4>
    </div> ';
}
?>



<?php
          $tabusers='<table id="example1" class="table table-bordered ">
          <thead>
            <th>Email</th>
            <th>Nom & Prenom</th>
            <th>Status</th>
            <th>Date D\'engagement</th>
            <th>Outils</th>
          </thead>
          <tbody>';
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from compte c,user u where c.id_user=u.id_user";
          $stmt=$pdo->query($req);

          foreach ($stmt as $row) {
	          if($row['status_compte']=="0"){
                    $tabusers=$tabusers.'
                    <tr>
                    <td>'.$row['login'].'</td>
                    <td>'.$row['nom_user']." & ".$row['prenom_user'].'</td>
                     <td><span class="label label-success">active</span></td>
                    <td>'.$row['date_inscription'].'</td>
                    <td>
                      <button class="btn btn-success btn-sm edit btn-flat" data-toggle="modal" data-target="#des_user" onclick="aff(this)"  id_user="'.$row['id_user'].'"><i class="fa fa-edit"></i> desactiver</button>
                      <button class="btn btn-danger btn-sm delete btn-flat"  data-toggle="modal" data-target="#sup_user" onclick="aff(this)"  id_user="'.$row['id_user'].'"><i class="fa fa-trash"></i> Supp</button>
                    </td>
                  </tr>
                    
                    ';
            }elseif ($row['status_compte']=="2") {
               $tabusers=$tabusers.'
              <tr>
              <td>'.$row['login'].'</td>
              <td>'.$row['nom_user']." & ".$row['prenom_user'].'</td>
               <td><span class="label label-warning">not verified</span></td>
              <td>'.$row['date_inscription'].'</td>
              <td>
                <button class="btn btn-success btn-sm edit btn-flat" data-toggle="modal" data-target="#act_user" onclick="aff(this)"  id_user="'.$row['id_user'].'"><i class="fa fa-edit"></i> activer</button>
                <button class="btn btn-danger btn-sm delete btn-flat" data-toggle="modal" data-target="#sup_user" onclick="aff(this)" id_user="'.$row['id_user'].'" ><i class="fa fa-trash"></i> Supp</button>
              </td>
            </tr>
              
              ';
             
            }else{
              $tabusers=$tabusers.'
              <tr>
              <td>'.$row['login'].'</td>
              <td>'.$row['nom_user']." & ".$row['prenom_user'].'</td>
               <td><span class="label label-danger">desactive</span></td>
              <td>'.$row['date_inscription'].'</td>
              <td>
                <button class="btn btn-success btn-sm edit btn-flat" data-toggle="modal" data-target="#act_user" onclick="aff(this)"  id_user="'.$row['id_user'].'"><i class="fa fa-edit"></i> activer</button>
                <button class="btn btn-danger btn-sm delete btn-flat" data-toggle="modal" data-target="#sup_user" onclick="aff(this)" id_user="'.$row['id_user'].'" ><i class="fa fa-trash"></i> Supp</button>
              </td>
            </tr>';
            }
          }
          $tabusers=$tabusers."</tbody></table>";
          ?>


<!-- modal sup user -->
             <div id="sup_user" class="modal fade">
              <form method="post">
                  <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body">
                                <center>  <h3> Voulez-vous supprimer le Compte de <span id="div_sup" style="color:red;"></span> </h3></center>
                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                 <button type="submit" value="" id="supprimer" class="btn btn-danger delete btn-flat" name="sup"><i class="fa fa-trash"></i> Supprimer </button>
                        </div>

                        </div>
                 </div>
                 </form>
           </div>
<!-- End modal sup_user -->


<!-- modal active compte -->
             <div id="act_user" class="modal fade">
              <form method="post">
                  <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body">
                                <center>  <h3> Voulez-vous activer le Compte de <span id="div_act" style="color:red;"></span> </h3></center>
                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                 <button type="submit" value="" id="act" class="btn btn-success edit btn-flat " name="act"><i class="fa fa-edit"></i> activer </button>
                        </div>

                        </div>
                 </div>
                 </form>
           </div>
<!-- End modal active compte -->




<!-- modal desactive compte -->
             <div id="des_user" class="modal fade">
              <form method="post">
                  <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body">
                                 <center> <h3> Voulez-vous desactiver le Compte de <span id="div_des" style="color:red;"></span> </h3></center>
                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                 <button type="submit" value="" id="des" class="btn btn-success edit btn-flat" name="des"><i class="fa fa-edit"></i> desactiver </button>
                        </div>

                        </div>
                 </div>
                 </form>
           </div>
<!-- End modal desactive compte -->




    <section class="content">
             <?php echo $err?>
             
        <div class="row" >
          <div class="col-xs-12">
          <div class="box">
             <div class="box-body">
               <?php
          echo $tabusers;
          ?>
             </div>

          </div>
        </div>
          <!-- <form method="post"> -->
          
          <!-- </form> -->
        </div>
</section>
  </div>
</div>



<!-- ajax  user -->
<script type="text/javascript">
function aff(val){
              var str=val.getAttribute("id_user");
               var xmlhttp;
                          if(window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                          }else{
                            xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
                          }
                          xmlhttp.open("get","ajax/select_user.php?id_user="+str,true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange=affich;

                          function affich(){

                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                              document.getElementById("div_sup").innerHTML=xmlhttp.responseText;
                              document.getElementById("div_des").innerHTML=xmlhttp.responseText;
                              document.getElementById("div_act").innerHTML=xmlhttp.responseText;
                             var sup= document.getElementById("supprimer");
                             sup.setAttribute('value',str); 
                              var act= document.getElementById("act");
                             act.setAttribute('value',str); 
                              var des= document.getElementById("des");
                             des.setAttribute('value',str); 
                              
                            }else{
                              document.getElementById("div_sup").innerHTML="probleme de l'affichage";
                            }
                          }
}


</script>
<!-- end ajax  user -->


<?php include 'include/script.php'; ?>



</body>
</html>