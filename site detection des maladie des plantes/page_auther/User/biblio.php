<?php
session_start();
if(!empty($_SESSION['user'])){
$email=$_SESSION['user'];
}else{
    echo "<script>
            window.location='../loginform.php';
    </script>"  ;
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
		<style>
		
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

.active-cyan-2 input.form-control[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.active-cyan input.form-control[type=text] {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.active-cyan .fa, .active-cyan-2 .fa {
  color: #4dd0e1;
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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="">Bibliothèque </a>
						
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
       
        <section class="page-section portfolio" id="biblio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <div class="text-center">
				<br>
                    <h2 class="page-section-heading text-secondary mb-0 d-inline-block">Bibliothèque</h2>
                </div>
				
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
				
                <!-- Portfolio Grid Items-->
                <div class="row">
                    <!-- Portfolio Items-->

                    <div class="col-md-6 col-lg-3 mb-5">
                        <div class="portfolio-item mx-auto" >
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                 <div class="portfolio-item-caption-content text-center text-black"><a href="biblio_plante_medicine/plante_medicine.php"><i class="fas fa-plus fa-3x"></i></a></div>
                            </div><img width="400px" height="250px" src="assets/img/portfolio/med.jpg" alt="Plante Médicine" width="400px" height="300px" />
							
                        </div>
						<h4 class="masthead-heading mb-0"> </h4>
							<h4 class="masthead-heading mb-0"> Plante Médicine</h4>
                    </div>


                    <div class="col-md-6 col-lg-3 mb-5">
                        <div class="portfolio-item mx-auto">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><a href="biblio_plante/plante.php"><i class="fas fa-plus fa-3x"></i></a>
                                </div>
                            </div><img  src="assets/img/portfolio/plt.jpg" width="400px" height="250px" alt="Plante"/>
							
                        </div>
						<h4 class="masthead-heading mb-0"> </h4>
							<h4 class="masthead-heading mb-0"> Plante </h4>
                    </div>
				
                    <div class="col-md-6 col-lg-3 mb-5">
                        <div class="portfolio-item mx-auto">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-black"><a href="biblio_maladie/maladie.php"><i class="fas fa-plus fa-3x"></i></a></div>
                            </div><img width="400px" height="250px" src="assets/img/portfolio/ml.jpg" alt=" Maladie"  />
							
                        </div>
						<h4 class="masthead-heading mb-0"> </h4>
						<h4 class="masthead-heading mb-0"> Maladie  </h4>
                    </div>



                    <div class="col-md-6 col-lg-3 mb-5">
                        <div class="portfolio-item mx-auto">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><a href="biblio_traitement/traitement.php"><i class="fas fa-plus fa-3x"></i></a></div>
                            </div><img width="400px" height="250px" src="assets/img/portfolio/tra2.jpg" alt=" Traitement "/>
							
                        </div>
						<h4 class="masthead-heading mb-0"> </h4>
							<h4 class="masthead-heading mb-0"> Traitement </h4>
                    </div> 
                   
                </div>
            </div>
        </section>
        <!-- Portfolio Modal-->
           
       
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
        
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed"><a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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