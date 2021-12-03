<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	
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



	<link rel="stylesheet" type="text/css" href="../css/style/style_register.css">
	<link rel="stylesheet" type="text/css" href="../css\bootstrap\css\bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
</head>

<style type="text/css">
  

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 15px;
  color: #777;
}

.container2 {
  max-width: 400px;
  width: 100%;
  /*margin: 0 auto;*/
  position: relative;
  margin-top: 0px;

}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact input[type="date"],
#contact input[type="password"],
#contact select,
#contact textarea,
#contact button {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  /*background: #F9F9F9;*/
  padding: 25px;
  margin: 10px;
  /*box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 50px 50px 0 rgba(0, 0, 0, 0.24);*/
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}



fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact input[type="date"],
#contact input[type="password"],
#contact select,
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 9px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact input[type="date"]:hover,
#contact input[type="password"]:hover,
#contact select:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}


#contact select{
  font-size: 13px;
}

#contact textarea {
  height: 80px;
  max-width: 100%;
  resize: none;
}

#contact button {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}


#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}
table{
  width: 100%;
}


a{
  /* display: block; */
  text-align: right;
  text-decoration: none;
  color: #999;
  font-size: 0.9rem;
  transition: .3s;
  margin-bottom: 10px;
  color:gray;
}

a:hover{
  color: #38d39f;
}

/*input[type="checkbox"]{
  border-color: green;
  margin-top: -40px;
}*/
.checkboxlabel{
  /*display: block;*/
  text-decoration: none;
  color: #999;
  font-size: 15px;
  transition: .3s;
  /* margin-top: -20px; */
  /* margin-bottom: 10px; */
}

.loginhere {
    color: #555;
    font-weight: 500;
    text-align: center;
    margin-top: 1px;
    margin-bottom: 5px;
}




</style>




<body>
	<img class="wave" src="../img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../img/bg.svg">
		</div>
<div class="container2">
 <div id="contact">
    <h3>Sign Up</h3>
          <table style="width: 120%;">
            <tr>
              <td>
                <fieldset>
                <input placeholder="Prenom" type="text" name="prenom" id="prenom" tabindex="1"  pattern="[A-Za-z]{3,12}"
                title="Nom doit &ecirc;tre entre 3 &agrave; 12 caract&egrave;res de longueur et contient juste des lettres" required>
              </fieldset>
              </td>
              <td>
                <fieldset>
                <input placeholder="Nom" type="text" name="nom" id="nom" tabindex="1" pattern="[A-Za-z]{3,15}"
                title="Nom doit &ecirc;tre entre 3 &agrave; 15 caract&egrave;res de longueur et contient juste des lettres" required>
              </fieldset>
              </td>
            </tr>
            <tr>
              <td>
                <fieldset>
                        <input placeholder="Ville" type="text" name="ville" id="ville" tabindex="4" pattern="[A-Za-z]{3,30}"
                title="Ville doit &ecirc;tre entre 3 &agrave; 30 caract&egrave;res de longueur et contient juste des lettres" required>
                </fieldset>
              </td>
              <td>
                    <fieldset>
                        <input placeholder="Pays" type="text" name="pays" id="pays" tabindex="4" pattern="[A-Za-z]{3,30}"
                title="Pays doit &ecirc;tre entre 3 &agrave; 30 caract&egrave;res de longueur et contient juste des lettres" required>
                    </fieldset> 
              </td>
            </tr> 
            <tr>
              <td>
                <fieldset>
                    <input placeholder="Telephone" type="tel" name="tele" id="tele" tabindex="3" pattern="[0-9]{10}"
                title="Telephone doit &ecirc;tre 10 caract&egrave;res de longueur et contient juste des nombres" required> 
                </fieldset>
              </td>
              <td>
                <fieldset>
                    <input placeholder="Date Naissance" type="text" id="daten" onfocus="(this.type='date')" name="daten" tabindex="4" required
                    min="1900-01-01" max="2010-01-01">
                </fieldset>
              </td>
            </tr>
            <tr>
              <td>
              <fieldset>
                <select  name="sexe" id="sexe" required>
                  <option value="" hidden="">Sexe</option>
                  <option>Homme</option>
                  <option>Femme</option>
                  <!-- <option>autre</option> -->
                </select>
              </fieldset>
              </td>
              <td>
                 <fieldset>
                       <input placeholder="Fonction" id="fonct" type="text" tabindex="1" name="fonct" pattern="[A-Za-z]{3,30}"
                title="Fonction doit &ecirc;tre entre 3 &agrave; 30 caract&egrave;res de longueur et contient juste des lettres" required>
                 </fieldset>
              </td>
            </tr>
            <tr>
              <td>
                
              </td>
              <td>
                
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <input placeholder="Email Address" id="email" type="email" tabindex="2" name="email" required>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <input placeholder="Password" id="pass" type="password" tabindex="2" name="password" pattern="[A-Za-z0-9.@_-]{6,15}"
                title="Prenom doit &ecirc;tre entre 6 &agrave; 15 caract&egrave;res de longueur et contient juste des lettres, numero et (.@-_)" required >
                <input type="checkbox" onclick="Afficher()">
                <label class="checkboxlabel" for="ch" id="che" style="font-size: 12px;">Afficher Mot de pass</label>
              </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <textarea placeholder="Adresse" id="adresse" tabindex="5" name="adresse" pattern="[A-Za-z/d/.]{6,12}"
                title="Prenom doit &ecirc;tre entre 3 &agrave; 12 caract&egrave;res de longueur et contient juste des lettres" required></textarea>
                </fieldset>
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <fieldset>
              <input type="checkbox" id="ch" name="condition" id="condition" value="check" required>
              <label class="checkboxlabel" for="ch" id="textcheckbox">I am legally permitted to submit forms</label>
            </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <button name="ajouter" id="signup" onclick="verifier()" data-toggle="modal" data-target="" data-submit="...Sending">Sign Up</button>
                </fieldset>
              </td>
            </tr>
            <tr>
            <td colspan="2">
            
              <p class="loginhere">Avez-vous déja un compte ?<b><a href="loginform.php" style="font-weight: 700;color: #222;" >Connexion</b></i></p>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            </td>
            </tr>
          </table>
  </div>
</div>    
</div>

<!-- modal sup user -->
       <div id="comptem" class="modal fade">
                  <div class="modal-dialog">
                       <div class="modal-content">
                            <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                        <div id="modd">
                          <br><br><br><br>
                          <center>
                     <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                     </div>
                     </center>
                     <br><br><br><br>
                    </div>
                        </div>
                 </div>
               
           </div>
<!-- End modal sup_user -->

<script>
function Afficher(){
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<!-- script verifier code -->

<!-- script ajax creer user -->
<script type="text/javascript">
function creeruser(prenom,nom,ville,pays,tele,daten,sexe,fonct,email,password,adresse) {
       var xmlhttp;
                          if(window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                          }else{
                            xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
                          }
                          xmlhttp.open("get","ajaxcreeruser.php?prenom="+prenom+"&nom="+nom+"&ville="+ville+"&pays="+pays+"&tele="+tele+"&daten="+daten+"&sexe="+sexe+"&fonction="+fonct+"&email="+email+"&password="+password+"&adresse="+adresse,true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange=affich;

                          function affich(){

                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                              //var p=xmlhttp.responseText;
                            
                              //document.getElementById("modd").innerHTML=p;
                              
                              window.location="User/index_user.php";
                           
                              
                            }else{
                              document.getElementById("des_body").innerHTML="probleme de l'affichage";
                            }
                          }
  }
  </script>
<!-- end -->

<!-- verifier code -->
<script type="text/javascript">
  var prenom=document.getElementById('prenom');
    var nom=document.getElementById('nom');
    var ville=document.getElementById('ville');
    var pays=document.getElementById('pays');
    var tele=document.getElementById('tele');
    var daten=document.getElementById('daten');
    var sexe=document.getElementById('sexe');
    var fonct=document.getElementById('fonct');
    var email=document.getElementById('email');
    var password=document.getElementById('pass');
    var adresse=document.getElementById('adresse');
  function vercode(){
    var btnver=document.getElementById('verifier');
    var codebtn=btnver.getAttribute('coden');
    var inp=document.getElementById('code');
    if(inp.value==codebtn){
creeruser(prenom.value,nom.value,ville.value,pays.value,tele.value,daten.value,sexe.value,fonct.value,email.value,password.value,adresse.value)
    }else{
      document.getElementById('des_body').innerHTML="le code est incorrect";
    }
  }
</script>

<!-- end -->
<!-- script ajax -->
<script type="text/javascript">
  
	function Verifieremail(prenom,nom,ville,pays,tele,daten,sexe,fonct,email,password,adresse) {
			 var xmlhttp;
                          if(window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                          }else{
                            xmlhttp= new ActiveXObject(Microsoft.XMLHTTP);
                          }
                          xmlhttp.open("get","ajaxAjoutercompte.php?prenom="+prenom+"&nom="+nom+"&ville="+ville+"&pays="+pays+"&tele="+tele+"&daten="+daten+"&sexe="+sexe+"&fonction="+fonct+"&email="+email+"&password="+password+"&adresse="+adresse,true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange=affich;

                          function affich(){

                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                              var p=xmlhttp.responseText;
                              if(p==null){
                                 document.getElementById("modd").innerHTML='';

                              }else{
                                 document.getElementById("modd").innerHTML=p;  
                              }
                            
                              
                              
                            }else{
                              document.getElementById("des_body").innerHTML="probleme de l'affichage";
                            }
                          }
	}

</script>
<!-- End -->


<!-- script verifier les champs -->
<script type="text/javascript">
	counterr=0;
	function verifier() {
		var prenom=document.getElementById('prenom');
		var prenomtest=/^([a-zA-Z]{3,20})$/;
		var nom=document.getElementById('nom');
		var nomtest=/^([a-zA-Z]{3,20})$/;
		var ville=document.getElementById('ville');
		var villetest=/^([a-zA-Z]{3,20})$/;
		var pays=document.getElementById('pays');
		var paystest=/^([a-zA-Z]{3,20})$/;
		var tele=document.getElementById('tele');
		var teletest=/^([0-9]{10})$/;
		var daten=document.getElementById('daten');
		var sexe=document.getElementById('sexe');
		var fonct=document.getElementById('fonct');
		var foncttest=/^([a-zA-Z]{3,30})$/;
		var email=document.getElementById('email');
		var emailtest= /^([a-zA-Z0-9_.-]+)@([a-zA-Z0-9-]+)\.([a-zA-Z]{2,})$/;
		var password=document.getElementById('pass');
		var passwordtest=/^[-_@A-Za-z0-9]{6,}$/ ;
		var adresse=document.getElementById('adresse');
		var checkboxid=document.getElementById('ch');
        if (prenomtest.test(prenom.value)==false) {
          prenom.setAttribute('style','border-color:red;color:red;');
          counterr++;
        }else{
          prenom.setAttribute('style','border-color:green;color:green;');
        }
        if (nomtest.test(nom.value)==false) {
        	counterr++;
          nom.setAttribute('style','border-color:red;color:red;');
        }else{
          nom.setAttribute('style','border-color:green;color:green;');
        } 
        if (villetest.test(ville.value)==false) {
        	counterr++;
          ville.setAttribute('style','border-color:red;color:red;');
        }else{
          ville.setAttribute('style','border-color:green;color:green;');
        }
        if (paystest.test(pays.value)==false) {
        	counterr++;
          pays.setAttribute('style','border-color:red;color:red;');
        }else{
          pays.setAttribute('style','border-color:green;color:green;');
        }
        if (teletest.test(tele.value)==false) {
        	counterr++;
          tele.setAttribute('style','border-color:red;color:red;');
        }else{
          tele.setAttribute('style','border-color:green;color:green;');
        }
        if (daten.value=="") {
        	counterr++;
          daten.setAttribute('style','border-color:red;color:red;');
        }else{
          daten.setAttribute('style','border-color:green;color:green;');
        }
          if (sexe.value=="") {
          	counterr++;
          sexe.setAttribute('style','border-color:red;color:red;');
        }else{
          sexe.setAttribute('style','border-color:green;color:green;');
        }
          if (foncttest.test(fonct.value)==false) {
          	counterr++;
          fonct.setAttribute('style','border-color:red;color:red;');
        }else{
          fonct.setAttribute('style','border-color:green;color:green;');
        }
          if (emailtest.test(email.value)==false) {
          	counterr++;
          email.setAttribute('style','border-color:red;color:red;');
        }else{
          email.setAttribute('style','border-color:green;color:green;');
        }
		if (passwordtest.test(password.value)==false) {
			counterr++;
          password.setAttribute('style','border-color:red;color:red;');
        }else{
          password.setAttribute('style','border-color:green;color:green;');
        }
        if (adresse.value=="") {
        	counterr++;
          adresse.setAttribute('style','border-color:red;color:red;');
        }else{
          adresse.setAttribute('style','border-color:green;color:green;');
        }
        if(checkboxid.checked==false){
        	counterr++;	
        	document.getElementById('textcheckbox').setAttribute('style','color:red;');
        	checkboxid.setAttribute('style','border-color:red;')
        }



        if(counterr==0){
              document.getElementById('modd').innerHTML='<br><br><br><br><center><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></center><br><br><br><br>';
        	    Verifieremail(prenom.value,nom.value,ville.value,pays.value,tele.value,daten.value,sexe.value,fonct.value,email.value,password.value,adresse.value);
              document.getElementById('signup').setAttribute('data-target','#comptem');
             counterr=0;
        }else{
        	document.getElementById('signup').setAttribute('data-target','');
           counterr=0;
        }

        
	}
</script>


<script type="text/javascript" src="../js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/main_register.js"></script>
<script >
if('serviceWorker' in navigator){
   navigator.serviceWorker.register('../sw.js')
   .then((reg) => console.log('service worker registred', reg))
   .catch((err) => console.log('service worker not registred', err));
}
</script>
</body>
</html>
