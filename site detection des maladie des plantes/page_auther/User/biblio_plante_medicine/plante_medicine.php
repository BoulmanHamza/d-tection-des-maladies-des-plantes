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
  <link rel="manifest" href="../../../manifest.json">
  <link rel="icon" href="../../../favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="../../../icons/Icon-152.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="msapplication-TileImage" content="../../../icons/Icon-144.png">
<!-- END PWA -->
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
         
        <link href="../css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="../css/heading.css">
        <link rel="stylesheet" href="../css/body.css">
                <link href="style2.css" rel="stylesheet">

        <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
  <script src="simple-bootstrap-paginator.js"></script>
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

		
		</style>
    </head>


<?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
   } catch (Exception $e) {
  echo $e->getMessage();
   }
$perPage = 12;
$totalrecorde=0;
$req = "SELECT * FROM plante where plante_Medicine='Oui'";
$stmt=$pdo->query($req);
foreach ($stmt as $row) {
  $totalrecorde++;
}

$totalPages = ceil($totalrecorde/$perPage);

?>

    <body id="page-top">
   <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
            <div class="container"><a class="navbar-brand js-scroll-trigger" href="#page-top">SMART AGRICULTURE </a>
                <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                 <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../index_user.php">Acceuil</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../biblio.php">Bibliothèque </a>
            
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../reconnaisance.php">Reconnaissance </a></li>
                        
                        <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../home.php">Profile</a>
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
                window.location='../../loginform.php';
         </script>" ;
     }

     ?>   

        <section class="page-section portfolio" id="biblio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <div class="text-center">
				<h2 class="page-section-heading text-secondary mb-0 d-inline-block"> </h2>
				<br>
                    <h2 class="page-section-heading text-secondary mb-0 d-inline-block">Plante Médicine </h2>
                </div>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"><div class="divider-custom-line"></div>
                   </div>
                </div>
				<br>
				<hr>

<?php

if (isset($_POST['readmore'])) {

$_SESSION['nompm']=$_POST['readmore'];
echo '<script>
  window.location="afficher_plante_medicine.php";
  </script>';

}

?>

	
  <div class="row">
  <select class="form-control col-lg-4 col-sm-4" id="region_plante_medicine">
      <option hidden="">--select region--</option>
       <?php
                             try {
                              $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
                            } catch (Exception $e) {
                              echo $e->getMessage();
                            }
                            $req="select DISTINCT region from plante";
                            $stmt=$pdo->query($req);
                            foreach ($stmt as $row) {
                              echo '<option>'.$row['region'].'</option>';
                            }
                      ?>
  </select> 
  <span class="col-lg-1"></span>
  
  <button class="btn btn-secondary col-lg-2 col-md-2 col-sm-4 " style="margin-top: 2px; margin-left: 2px;" id="rechercher">rechercher</button>
</div>
<br>
<hr>
<div class="row">
  <div class="col-sm-12 col-lg-12 col-md-12">
                  <form method="POST">
                        <div id="content"></div>
                   </form>  
  </div>
<div class="col-lg-4"></div>
                       <div class="col-lg-4  pagination-lg">
                      <div id="pagination">  </div>
                       <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">  
                       </div>



</div>
            
            </div>
        </section>
        <!-- Portfolio Modal-->
      

        </section>
         <footer class="footer text-center" style="background-color: #2c3e50!important;">
            <div class="container">
		
                <div class="row">
                    <!-- Footer Location-->
				<div class="col-lg-4 mb-5 mb-lg-0">
				<img class="img-fluid rounded mb-5" src="../assets/img/portfolio/usmba.jpg" style="width:80%"alt="Plante"/>
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
      
     
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
      

       <script src="../../lib/jquery/jquery-migrate.min.js"></script> 
  
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script> 

  <script src="../../lib/counterup/jquery.counterup.js"></script>
 
   <script src="../../lib/typed/typed.min.js"></script> 

   <script src="../../js/main.js"></script> -->
        <script src="../js/scripts.js"></script> 
        <script src="pagination.js"></script>


<script type="text/javascript">
  document.getElementById("rechercher").addEventListener("click",function(){
var xmlhttp;
if(window.XMLHttpRequest){
   xmlhttp=new XMLHttpRequest();
}else{
   xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
}
var region=document.getElementById("region_plante_medicine").value;
xmlhttp.open("get","recherche_plante_medicine.php?region="+region,true);
xmlhttp.send();
xmlhttp.onreadystatechange=affich;

function affich(){
  if(xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("content").innerHTML=xmlhttp.responseText;
        document.getElementById("pagination").style.display='none';
  }else{
    document.getElementById("content").innerHTML="probleme de l'affichage";
  }
}
})
</script>
<script >
if('serviceWorker' in navigator){
   navigator.serviceWorker.register('../../../sw.js')
   .then((reg) => console.log('service worker registred', reg))
   .catch((err) => console.log('service worker not registred', err));
}
</script>

    </body>
</html>