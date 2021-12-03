<?php

session_start();

$nompm=$_SESSION['nompm'];





try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
   } catch (Exception $e) {
  echo $e->getMessage();
   }
$perPage = 12;
$totalrecorde=0;
$req = "SELECT * FROM plante where nom_plantes=?";
$stmt=$pdo->prepare($req);
$stmt->execute([$nompm]);
foreach ($stmt as $row) {
  $ref=$row['reference_plantes'];
  $pay=$row['pays_mere'];
  $photo=$row['photo_plante'];
  $desc=$row['description'];
  $region=$row['region'];

}






?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Smart AGRICULTURE</title>
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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  

  <!-- Bootstrap CSS File -->
  <link href="../../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
 
  <!-- Main Stylesheet File -->
  <link href="../../../css/style/style.css" rel="stylesheet">
  <link href="style2.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/heading.css">
        <link rel="stylesheet" href="../css/body.css">
        <link href="../css/styles.css" rel="stylesheet">

 <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
  <script src="simple-bootstrap-paginator.js"></script>

    <!-- Css Styles -->
    
   
	 <!-- Bootstrap CSS File -->
  <!-- <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Libraries CSS Files -->
 

  <!-- Main Stylesheet File -->


	<style type="text/css">
    
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

  <!--/ Nav Star /-->
 


  
  
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
 
  
    
      



<br><br><br>




<section id="Information" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-7">
                <div class="row">
                   <div class="col-sm-2 col-md-2">
                  </div>
                  <div class="col-sm-10 col-md-10">
                    <div class="about-img">
                      <img src="../../../admin/imgBD/plante/<?php echo $photo?>" style="width:80%">
					 
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="intro-subtitle" style="color: #3CB371; font-size: 35px;">
                    <?php echo $nompm?>
                    </h5>
                  </div>
                <p class="lead" style="text-align: justify;"></p>

							  <p><b>Réference  : </b> <?php echo $ref ?> </p>

								<p><b> Pays Mère : </b> <?php echo $pay ?> </p>

								<p><b> Region : </b> <?php echo $region ?> </p>

								<p><b>Description : </b> <?php echo $desc ?></p>

								<p><b>Liste des malaidies suggérés : </b> </p>



<?php

try {
  $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
   } catch (Exception $e) {
  echo $e->getMessage();
   }

$req = "SELECT * FROM plante p,maladie m ,dossier_medicale d  where p.id_plantes=d.id_plantes and d.id_maladie=m.id_maladie and nom_plantes=?";
$stmt=$pdo->prepare($req);
$stmt->execute([$nompm]);
foreach ($stmt as $row) {
  echo "<p><i> - ".$row['nom_maladie']." </i> </p>";

}


?>



								
								<br>
								 
                                    
                                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





<div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Commantaire</h2>
                    </div>
</div>


<?php
$err='';

if (isset($_POST['Envoyer'])) {
try {
    $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  $comm=$_POST['comm'];
  $email=$_SESSION['user'];
  $req="select * from compte where login=?";
                    $stmt=$pdo->prepare($req);
                    $stmt->execute([$email]);
                    foreach ($stmt as $row) {
                      $id_user=$row['id_user'];
                    }
  $today=date('y/m/d');
  $req='insert into commentaire (commentaire,date_commentaire,status_commentaire,id_compte,type,nom) values(?,?,?,?,?,?)';
  $stmt=$pdo->prepare($req);
  $stmt->execute([$comm,$today,'1',$id_user,'plante',$nompm]);

  $err='<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-success"></i>votre commentaire à été ajouter et sera afficher dans la page aprés la verification et merci.</h4>
    </div>';
}

?>
<div class="container">
  <form method="post">
<div class="row">
  <div class="col-sm-12">
  <div class="box-shadow-full">
    <div class="row">
 
  <div class="col-sm-8">
    <input type="text" placeholder="Ajouter un Commantaire ......" class="form-control" name="comm" required>
  </div>
  <div class="col-sm-2">
    <button class="btn btn-primary" style="margin-top: 2px;"  name="Envoyer">Envoyer</button>
  </div>
</div>

  </div>
  </div>
</div> 
</form>
<div class="row">
  <?php echo $err;?>
  </div>
</div>
</div>     


<?php
$err='';

$cou=0;
try {
    $pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  $af='';
  $req="select * from commentaire where type='plante' and nom=? and status_commentaire=0";
                    $stmt=$pdo->prepare($req);
                    $stmt->execute([$nompm]);
                    foreach ($stmt as $row) {
                      $cou++;
                      $req2="select * from compte c,user u where c.id_user=u.id_user and c.id_user=?";
                      $stmt2=$pdo->prepare($req2);
                      $stmt2->execute([$row['id_compte']]);
                      foreach ($stmt2 as $row2) {
                        $nom_u=$row2['nom_user'].' '.$row2['prenom_user'];
                      }

                     $af.='

              <div class="row">
                
                  <div class="col-lg-1">
                     <img src="../img/user3.png" width="50px" height="40px">
              </div>
              <div class="col-lg-11">
                     <h5 class="intro-subtitle" style="color: black; font-size: 20px;">'.$nom_u.' <span style="font-size: 15px; color: gray;"> à '.$row['date_commentaire'].'</span> 
                    </h5>
             </div>
              </div>
              <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-11">
                  <p><b style="color: gray; margin-left: 20px;">'.$row['commentaire'].' </b></p>
                </div>
              </div>
                    <hr>
                     ';

                    }

                    if($cou==0){
                      $af.=' <div class="row">
                
                  
              <div class="col-lg-11">
                     <h5 class="intro-subtitle" style="color: black; font-size: 20px;">Aucun commentaire.</span> 
                    </h5>
               </div>
              </div>
              ';
                    }
 


?>


<section id="commantaire" class="about-mf sect-pt4 route" >
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">




          
             <?php echo $af?>








                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
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
        <!-- Bootstrap core JS-->
       <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
        <!-- Third party plugin JS-->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> -->
        <!-- Contact form JS-->
       
      
        <!-- Core theme JS-->
       
		<!-- <script src="../lib/jquery/jquery.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="../../lib/jquery/jquery-migrate.min.js"></script>
  
 <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>

  <script src="../../lib/counterup/jquery.counterup.js"></script>
 
  <script src="../../lib/typed/typed.min.js"></script>

  <script src="../../js/main.js"></script>
    <script src="../js/scripts.js"></script> 


<script >
if('serviceWorker' in navigator){
   navigator.serviceWorker.register('../../../sw.js')
   .then((reg) => console.log('service worker registred', reg))
   .catch((err) => console.log('service worker not registred', err));
}
</script>






    </body>
</html>