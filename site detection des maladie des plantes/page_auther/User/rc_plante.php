<?php

session_start();
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
    <script type="text/javascript" src="jquery/jquery.min.js"></script>

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

     ?>


   <?php
   $err='';
    if (isset($_POST['upload'])) {
  $file = $_FILES['file'];
  $fileName=$_FILES['file']['name'];
  $fileType=$_FILES['file']['type'];
  $fileTmpName=$_FILES['file']['tmp_name'];
  $fileSize=$_FILES['file']['size'];
  $fileError=$_FILES['file']['error'];
  //$file_stor="./image/".$file_name;
  //move_uploaded_file($file_tem_loc, $file_stor);

  $fileExt=explode('.',$fileName);
  $fileActualExt=strtolower(end($fileExt));
  $allowed=array('jpg','jpeg','png');

  $fileNameNew=uniqid('',true).".".$fileActualExt;
  
  //header("Location: testuploadimage.php");
  if($fileActualExt=='png' || $fileActualExt=='jpeg' || $fileActualExt=='jpg') {
    $fileDes='imgupload\\'.$fileNameNew;
  move_uploaded_file($fileTmpName,$fileDes);
  $nbr2=0;
$nbr1=0;
      try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
   } catch (Exception $e) {
  echo $e->getMessage();
   }

   $req = "SELECT * FROM plante ";
   $stmt=$pdo->query($req);
   foreach ($stmt as $row) {
    $nbr2++;
   }
   

      $nbr=shell_exec("python C:\\wamp\\www\\a_stage_site\\page_auther\\User\\rc_plante.py  ".$nbr1." ".$nbr2."  ");
     $req = "SELECT * FROM plante";
     $sel=0;
   $stmt=$pdo->query($req);
   foreach ($stmt as $row) {
      if($sel==$nbr){
        $_SESSION['upplante']=$row['nom_plantes'];
        echo "<script>
        window.location='afficher_rc_plante.php';
        </script>";

        break;
      }else{
        $sel++;
      }
   }

  }
  else{
    $err=$err='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>choisire un fichier de type PNG,JPEG ou JPG</h4>
    </div> ';
  }
        
     }



   ?>  








     <div class="container">
     <div class="row">
        <div class="col-sm-12">
          <?php echo $err?>
        </div>
      </div>
    </div>

        <section class="page-section portfolio" id="biblio" style="margin-top: -80px;">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <div class="text-center">
				<h2 class="page-section-heading text-secondary mb-0 d-inline-block"> </h2>
				
				<hr>
                    <h4 class="page-section-heading text-secondary mb-0 d-inline-block"> Reconnaissance des Plantes    </h4>
					<hr>
                </div>

               		
				<div class="box box-solid"style="margin='center-center'">
	        			<div class="container">       
				  <div class="row">
				<div class="col-sm-12" style="margin='center-center'">
								<div class="box-shadow-full">
             

<form method="post" enctype="multipart/form-data">
  
  
<div class="row">
<div class="col-lg-1"></div>
  <div class="custom-file col-lg-10"  >
    <input type="file" class="lg custom-file-input" id="customFile" name="file">
    <label class="custom-file-label" id='hh' for="customFile">Choose image</label>
  </div>
<div class="col-lg-1"></div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
       <button class="btn btn-success col-lg-12" name="upload">Upload la photo</button> 
    </div>
  <div class="col-lg-4"></div>
  </div>
  
 </form> 


<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

	
			<hr>

      
			<div class="col-sm-12">
                            <h2> Comment ça fonctionne !  </h2> 
							<br>
							
							<p> 	Veuillez cliquer sur Button Importer image. </p>
							<p> 	Vous chosiez l’image que vous voulez. </p>
							<p> 	Après de choisir l’image, vous confirmer avec la Button Upload .</p>
							<p> 	En attendent une petite instante, vous aurez le résultat souhaité. </p>

							
			</div>
		</div>	
	</div>
</div>
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
       
        <script src="bootstrap\js\bootstrap.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
     
       
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