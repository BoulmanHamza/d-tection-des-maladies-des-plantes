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
        Tableau de Bord 
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Tableau de bord</li>
      </ol>
    </section>


    <section class="content">

        <?php echo $err?>
            
        <br>
        <div class="row">
        	
          <?php
          $nbrplantes=0;
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from plante";
          $stmt=$pdo->query($req);
          foreach ($stmt as $row) {
	          $nbrplantes++;
          }
          ?>

        	<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $nbrplantes?></h3>
              <p>Nombre des Plantes</p>
            </div>
            <div class="icon">
              <i class="fa fa-barcode"></i>
            </div>
          </div>
        </div>





        <?php
          $nbrmaladies=0;
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from maladie";
          $stmt=$pdo->query($req);
          foreach ($stmt as $row) {
	          $nbrmaladies++;
          }
          ?>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $nbrmaladies?></h3>
              <p>Nombre des Maladies</p>
            </div>
            <div class="icon">
              <i class="fa fa-barcode"></i>
            </div>
          </div>
        </div>





        <?php
          $nbrtrait=0;
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from traitement";
          $stmt=$pdo->query($req);
          foreach ($stmt as $row) {
	          $nbrtrait++;
          }
          ?>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $nbrtrait?></h3>
              <p>Nombre des Traitements</p>
            </div>
            <div class="icon">
              <i class="fa fa-barcode"></i>
            </div>
          </div>
        </div>


        <?php
          $nbruser=0;
          try {
            $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          $req="select * from user";
          $stmt=$pdo->query($req);
          foreach ($stmt as $row) {
	          $nbruser++;
          }
          ?>



        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $nbruser?></h3>
              <p>Nombre des Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </div>
        </div>





        </div>
  </div>
</div>



<?php include 'include/script.php'; ?>
</body>
</html>