<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
   <!-- PWA -->

    <meta name="theme-color" content="green">
  <link rel="manifest" href="../manifest.json">
  <link rel="icon" href="../favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="../icons/Icon-152.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="msapplication-TileImage" content="../icons/Icon-144.png">
<!-- END PWA -->
	<link rel="stylesheet" type="text/css" href="../css\bootstrap\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style/style_login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


	<img class="wave" src="../img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="../img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" class="input" name="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<a href="#" data-toggle="modal" data-target="#forgetpass">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login" name="login">
            	<a href="registerform.php">Creer nouveau Compte</a>
				<center> <span id="sp" style="color: red; font-size:20px;"></span></center>
			</form>

			<!-- modal forgetpass -->
       <div id="forgetpass" class="modal fade">
                  <div class="modal-dialog">
                       <div class="modal-content">
                            <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div id="modd">
                         <div class="modal-body">
                               <div id="des_body" style="color:red; text-align:center; font-size:15px;"></div>
                                <input type="text" name="email" id="email" placeholder="entrer votre Email" class="form-control">
                               </div>

                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                 <button type="submit" onclick="forgetpass()"  value="" id="Envoyer" class="btn btn-primary btn-flat"  name="Envoyer"></i> Envoyer </button>
                        </div>
                    </div>
                        </div>
                 </div>
               
           </div>
<!-- End modal sup_user -->
			
        </div>
    </div>




	<script  type="text/javascript">
function ann() {
	 window.location="../home.html";
}
</script>
    <script type="text/javascript">
	counterr=0;
	function forgetpass() {
      var email=document.getElementById('email');
	  var emailtest= /^([a-zA-Z0-9_.-]+)@([a-zA-Z0-9-]+)\.([a-zA-Z]{2,})$/;
	  if (emailtest.test(email.value)==true) {
          	document.getElementById('des_body').innerHTML='<center><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></center>';
	  			          var xmlhttp;
                          if(window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                          }else{
                            xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
                          }
                          xmlhttp.open("get","forgetpassword.php?email="+email.value,true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange=affich;

                          function affich(){

                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                              
                              document.getElementById("des_body").innerHTML=xmlhttp.responseText;
                              
                            }else{
                              document.getElementById("des_body").innerHTML="probleme de l'affichage";
                              document.getElementById('des_body').setAttribute('style','color:red;');
                            }
                          }




        }else{
          document.getElementById('des_body').innerHTML='Email incorrect';
          document.getElementById('des_body').setAttribute('style','color:red;');
        }

	}
	</script>
    <script type="text/javascript" src="../js/main_login.js"></script>
    <script type="text/javascript" src="../js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap/js/bootstrap.min.js"></script>
<script >
if('serviceWorker' in navigator){
   navigator.serviceWorker.register('../sw.js')
   .then((reg) => console.log('service worker registred', reg))
   .catch((err) => console.log('service worker not registred', err));
}
</script>
</body>
</html>




<?php
$x=0;
if (isset($_POST['login'])) {
if(!empty($_POST['email']) || !empty($_POST['password']) ){

	try {
	$pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
	echo $e->getMessage();
}
$req="select * from compte";
$stmt=$pdo->query($req);
foreach ($stmt as $row) {
	if($row['login']==$_POST['email'] && $row['password']==$_POST['password'] && ($row['status_compte']=='0' || $row['status_compte']=='2' )){
        $x=1;
        break;
	}elseif($row['login']==$_POST['email'] && $row['password']==$_POST['password'] && $row['status_compte']=='1'){
        $x=2;
        break;
	}
}
if ($x==1) {
	
$_SESSION['user']=$_POST['email'];

	echo '<script>
  window.location="User/index_user.php";
	</script>';
}elseif($x==2){
echo '<script>
	document.getElementById("sp").innerHTML="Ce Compte est desactiver";
	</script>';
}else{
	echo '<script>
	document.getElementById("sp").innerHTML="Ce Compte n\'est existe pas";
	</script>';
}

}else{
	echo '<script>
	document.getElementById("sp").innerHTML="Entrer tous les champs";
	</script>';
}
}





?>