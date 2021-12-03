<?php

session_start();
if(!empty($_SESSION['user'])){
$email=$_SESSION['user'];
}else{
    echo "<script>
            window.location='../loginform.php';
    </script>"  ;
}
$err='';

try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}

$req="select * from user,compte where login=email_user and email_user=?";
                    $stmt=$pdo->prepare($req);
                    $stmt->execute([$email]);
                    foreach ($stmt as $row) {
                      $id_user=$row['id_user'];
                      $nom_user=$row['nom_user'];
                      $prenom_user=$row['prenom_user'];
                      $daten=$row['date_naissance'];
                      $sexe=$row['sexe_user'];
                      $fonction=$row['fonction_user'];
                      $tel=$row['tel_user'];
                      $adresse=$row['adresse_user'];
                      $ville=$row['ville_user'];
                      $pays=$row['pays_user'];
                      $date_insc=$row['date_inscription'];
                      $pass=$row['password'];

                    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> SMART AGRICULTURE</title>
          <!-- PWA -->

    <meta name="theme-color" content="green">
  <link rel="manifest" href="../../manifest.json">
  <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="../../icons/Icon-152.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="msapplication-TileImage" content="../../icons/Icon-144.png">
<!-- END PWA -->
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  	
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  	<style type="text/css">
  		.mt20{
  			margin-top:20px;
  		}
      .bold{
        font-weight:bold;
      }

      /*chart style*/
      #legend ul {
        list-style: none;
      }

      #legend ul li {
        display: inline;
        padding-left: 30px;
        position: relative;
        margin-bottom: 4px;
       /* border-radius: 5px;*/
        padding: 2px 8px 2px 28px;
        font-size: 14px;
        cursor: default;
        -webkit-transition: background-color 200ms ease-in-out;
        -moz-transition: background-color 200ms ease-in-out;
        -o-transition: background-color 200ms ease-in-out;
        transition: background-color 200ms ease-in-out;
      }

      #legend li span {
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 100%;
       /* border-radius: 5px;*/
      }
  		
.header__menu ul li .header__menu__dropdown {
	position: absolute;
	left: 0;
	top: 50px;
	background: #222222;
	width: 180px;
	z-index: 9;
	padding: 5px 0;
	-webkit-transition: all, 0.3s;
	-moz-transition: all, 0.3s;
	-ms-transition: all, 0.3s;
	-o-transition: all, 0.3s;
	transition: all, 0.3s;
	opacity: 0;
	visibility: hidden;
}
		</style>
    </head>
    <body id="page-top">
       <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
            <div class="container"><a class="navbar-brand js-scroll-trigger" href="#page-top">SMART AGRICULTURE </a>
                <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                 <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index_user.php">Acceuil</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="biblio.php">Bibliothèque </a>
            
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="reconnaisance.php">Reconnaissance </a></li>
                        
                        <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="home.php">Profile</a>
                        </li>

            <li class="nav-item mx-0 mx-lg-1">
              <form method="post">
              <button class="nav-link py-3 px-0 px-lg-3 btn btn-secondary rounded js-scroll-trigger" name="dec">Deconnexion</button>
                          </form>
                        </li>
                   
                    </ul>
                </div>
            </div>
        </nav>


 <?php
     if (isset($_POST['dec'])) {
         unset($_SESSION['user']);
         echo "<script>
                window.location='../loginform.php';
         </script>" ;
     }

  if (isset($_POST['edit'])) {
   $nom1=$_POST['firstname'];
   $prenom1=$_POST['lastname'];
   $datn1=$_POST['dateNa'];
   $sexe1=$_POST['sexe'];
   $fonction1=$_POST['fct'];
   $tel1=$_POST['tel'];
   $ville1=$_POST['ville'];
   $pays1=$_POST['pays'];
   $adresse1=$_POST['Adresse'];
   $email1=$_POST['edit'];
   $oldpass1=$_POST['curr_password'];
   $newpass1=$_POST['vpassword'];
   $reppass1=$_POST['password'];
   try {
    $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
  } catch (Exception $e) {
    echo $e->getMessage();
  }



  if($oldpass1 == $pass){
    if(empty($newpass1) || empty($reppass1) ){
      $req='update user SET nom_user="'.$nom1.'",prenom_user="'.$prenom1.'",date_naissance="'.$datn1.'",sexe_user="'.$sexe1.'",fonction_user="'.$fonction1.'",tel_user="'.$tel1.'",adresse_user="'.$adresse1.'",ville_user="'.$ville1.'",pays_user="'.$pays1.'" WHERE email_user="'.$email.'"';
      $stmt=$pdo->query($req);
      $nom_user=$nom1;
      $prenom_user=$prenom1;
       $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> le profil est  changer</h4>
    </div>';
     }elseif(!empty($newpass1) && !empty($reppass1)){
      if ($newpass1 != $reppass1) {
        $err='<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i> confirmation password est incorect</h4>
                </div> ';
        
      }else{
          $req='update user SET nom_user="'.$nom1.'",prenom_user="'.$prenom1.'",date_naissance="'.$datn1.'",sexe_user="'.$sexe1.'",fonction_user="'.$fonction1.'",tel_user="'.$tel1.'",adresse_user="'.$adresse1.'",ville_user="'.$ville1.'",pays_user="'.$pays1.'" WHERE email_user="'.$email.'"';
      $stmt=$pdo->query($req);
      $nom_user=$nom1;
      $prenom_user=$prenom1;
      $req='update compte SET password="'.$newpass1.'" WHERE login="'.$email.'"';
      $stmt=$pdo->query($req);
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

        <section class="page-section portfolio" id="biblio" style="margin-top: -92px;">
            <div class="container">
              <br><br>
              <?php echo $err?>
                <!-- Portfolio Section Heading-->
                <div class="text-center">
				<h2 class="page-section-heading text-secondary mb-0 d-inline-block"> </h2>
				<br>
				<hr>
                    <h4 class="page-section-heading text-secondary mb-0 d-inline-block"> Modifier compte   </h4>
					<hr>
                </div>

				<div class="box box-solid">
	        			 <form class="form-horizontal" method="POST" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-4">
                      <input type="text" value="<?php echo $nom_user?>" class="form-control" id="firstname" name="firstname" value="" required>
                    </div>
                    <label for="lastname" class="col-sm-2 control-label">Prénom </label>
                    <div class="col-sm-4">
                      <input type="text" value="<?php echo $prenom_user?>"  class="form-control" id="lastname" name="lastname" value="" required>
                    </div>
                </div>
                <hr>



                
				 <div class="form-group">
                    <label for="dateNa" class="col-sm-2 control-label">Date Naissance </label>
                    <div class="col-sm-4">
                      <input type="date" value="<?php echo $daten?>" class="form-control" id="dateNa" name="dateNa" value="" required>
                    </div>
                    <label for="sexe" class="col-sm-2 control-label">Sexe </label>
                <div class="col-sm-4 ">
                    <select class="form-control" id="sexe" name="sexe" required>
                      <option >Homme</option>
                      <option v>Femme</option>
                    </select>
                </div>
                </div>

				<hr>
                <div class="form-group">
                    <label for="fonction" class="col-sm-2 control-label">Fonction </label>

                    <div class="col-sm-4">
                      <input type="text" value="<?php echo $fonction?>" class="form-control" id="fct" name="fct" value="" required>
                    </div>
                    <label for="tel" class="col-sm-2 control-label">Telephone </label>

                    <div class="col-sm-4">
                      <input type="phone" class="form-control" value="<?php echo $tel?>" id="tel" name="tel" value="" required>
                    </div>

                </div>
				<hr>
                 <div class="form-group">
                    <label for="ville" class="col-sm-2 control-label">Ville </label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" value="<?php echo $ville?>" id="ville" name="ville" value="" required>
                    </div>
                    <label for="pays" class="col-sm-2 control-label">Pays </label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="pays" value="<?php echo $pays?>" name="pays" value="" required>
                    </div>

                </div>
        <hr>
                <div class="form-group">
                    <label for="Adresse" class="col-sm-2 control-label">Adresse </label>

                    <div class="col-sm-4">
                      <textarea name="Adresse" rows="5" cols="70" required><?php echo $adresse?></textarea>
                    </div>
                    

                </div>
        <hr>





				<div class="form-group">
                    
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">New Password (facultatif)</label>

                    <div class="col-sm-4">
                      <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                    <label for="vpassword" class="col-sm-2 control-label">verifier new Password (facultatif)</label>

                    <div class="col-sm-4">
                      <input type="password" class="form-control" id="vpassword" name="vpassword" value="">
                    </div>
                </div>
              <hr>
                
                
                <div class="form-group">
                    <label for="curr_password" class="col-sm-2 control-label">Current Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              	<a href="home.php"><button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button></a>
              <button type="submit" class="btn btn-success btn-flat" value="<?php echo $email?>" name="edit"><i class="fa fa-check-square-o"></i> Modifier</button>
              </form>
	        		</div>
            </div>     
        </section>

        <footer class="footer text-center">
            <div class="container">
		
                <div class="row">
                    <!-- Footer Location-->
				<div class="col-lg-4 mb-5 mb-lg-0">
				<img class="img-fluid rounded mb-5" src="assets/img/portfolio/usmba.jpg" style="width:80%"alt="Plante"/>
					   <h4 class="mb-4"> Adresse Postale: </h4>
                       <p class="pre-wrap lead mb-0"> B.P. 1796 Fès-Atlas,30003 MAROC</p>
				</div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
						<div class="d-flex flex-column align-items-center">
                        <div class="icon-contact mb-3"><i class="fas fa-mobile-alt"></i></div>
                            <div class="text-muted">Phone</div>
                            <div class="lead font-weight-bold">(+212)5 357-896636</div>
							<br>
					 </div>
        </div>
			<div class="col-lg-4 mb-5 mb-lg-0">
					<div class="d-flex flex-column align-items-center">
							<div class="icon-contact mb-3"><i class="far fa-envelope"></i></div>
                            <div class="text-muted">Email</div><a class="lead font-weight-bold" href="mailto:name@example.com">fsdmlabo@gmail.com</a>
                    </div>
                    <!-- Footer Social Icons-->
                    
                    
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
      
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed"><a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script >
if('serviceWorker' in navigator){
   navigator.serviceWorker.register('../../sw.js')
   .then((reg) => console.log('service worker registred', reg))
   .catch((err) => console.log('service worker not registred', err));
}
</script>
    </body>
</html>