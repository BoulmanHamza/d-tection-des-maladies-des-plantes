<?php

session_start();
if(!empty($_SESSION['user'])){
$email=$_SESSION['user'];
}else{
    echo "<script>
            window.location='../loginform.php';
    </script>"  ;
}

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

     ?> 

        <section class="page-section portfolio" id="biblio" style="margin-top: -60px;">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <div class="text-center">
				<h2 class="page-section-heading text-secondary mb-0 d-inline-block"> </h2>
				<br>
				<hr>
                    <h4 class="page-section-heading text-secondary mb-0 d-inline-block"> Modifier compte   </h4>
					<hr>
                </div>

               		
				<div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-3">
	        					
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row"> 
	        						<div class="col-sm-3">
	        							<h4>Nom:</h4>
										<h4>Prénom:</h4>
										<h4>DATE Naissance:</h4>
										<h4>SEXE:</h4>
										<h4>Fonction:</h4>
	        							<h4>Email:</h4>
	        							<h4>Adresse:</h4>
	        							<h4>Date d'engagement:</h4>
	        						</div>
									<hr>
	        						<div class="col-sm-9">
	        							<h4>  <?php echo $nom_user?> </h4>
										
										<h4><?php echo $prenom_user?></h4>
										<h4><?php echo $daten?></h4>
										<h4><?php echo $sexe?></h4>
										<h4><?php echo $fonction?></h4>
	        							<h4><?php echo $email?></h4>
	        							<h4><?php echo $adresse?></h4>
	        							<h4><?php echo $date_insc?></h4>
	        							
										<span class="pull-right">
											 
	        									<a href="modifier.php" class="btn btn-success btn-flat btn-sm" data-toggle="modal fade" data-target="#edit1"><i class="fa fa-edit"></i> Modifier</a>
	        								</span>
	        						
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
            </div>     
        </section>
		  <section class="page-section portfolio" id="biblio">
            <div class="container">
                <!-- Portfolio Section Heading-->


                <!-- delete commantaire -->
                <?php
$c=0;
if(isset($_POST['sup'])){
  $sql2="delete from commentaire where id_commentaire=?";
  $stmt2=$pdo->prepare($sql2);
  $stmt2->execute([$_POST['sup']]);

}
?>
                <!-- end -->

<?php

try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
  echo $e->getMessage();
}

$req="select * from user u,compte co,commentaire c where c.id_compte=co.id_compte and login=email_user and login=?";
                    $stmt=$pdo->prepare($req);
                    $stmt->execute([$email]);
                    $tables='';
                    foreach ($stmt as $row) {
                      $tables.='

                    <tr>
                            
                            <td>'.$row['date_commentaire'].'</td>
                            <td>'.$email.'</td>
                            <td>'.$row['nom_user'].'&'.$row['prenom_user'].'</td>
                            <td>'.$row['commentaire'].'</td>
                            <td>
                             
                              <button class="btn btn-danger btn-sm delete btn-flat"  onclick="aff(this)" data-toggle="modal" data-target="#sup_comm" id_comm="'.$row['id_commentaire'].'"><i class="fa fa-trash"></i> Supp</button>
                            </td>
                  </tr>
                      ';
                    }


?>
              
				<div class="box-header with-border">
	        <h4 class="box-title"><i class="fa fa-calendar"></i> <b>Votre Historique des Commentaires </b></h4>
	      </div>
		  <div class="box-header with-border">
	        				<h4 class=""><i class=""></i> <b></b></h4>
	      </div>
	        <div class="">
			<table id="" class="table table-bordered">
                <thead>
                  <th>DATE </th>
                  <th>Email</th>
                  <th>Nom</th>
                  <th>Commentaire</th>
                  <th>Outils</th>
                </thead>
                <tbody>
		<?php echo $tables?>
                           

                </tbody>
              </table>
               		
			</div>
	        			</div>
      </section>


<!-- model sup commantair -->
    <div class="modal fade" id="sup_comm" >
              <form method="post">
                  <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body">
                                <center>  <h3> Voulez-vous supprimer ce commantaire <span id="div_sup" style="color:red;"></span> </h3></center>
                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                 <button type="submit" value="" id="supprimer" class="btn btn-danger delete btn-flat" name="sup"><i class="fa fa-trash"></i> Supprimer </button>
                        </div>

                        </div>
                 </div>
                 </form>
           </div>

<!-- end sup commantaire -->


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
        

<script type="text/javascript">
function aff(val){
              var str=val.getAttribute("id_comm");
               
                              var sup= document.getElementById("supprimer");
                              sup.setAttribute('value',str); 
                              
                          
                              
                           
                          
}


</script>






        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script >
if('serviceWorker' in navigator){
   navigator.serviceWorker.register('../../sw.js')
   .then((reg) => console.log('service worker registred', reg))
   .catch((err) => console.log('service worker not registred', err));
}
</script>
    </body>
</html>