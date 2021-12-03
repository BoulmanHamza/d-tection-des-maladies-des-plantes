
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMART AGRIGULTURE </title>
  
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
</head>
<body style="background-color:rgb(19,88,108);">
<div class="login-box" style="margin-top: 200px;">
    
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="POST">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i>Connecter</button>
            </div>
          </div>
      </form>
      <br>
      <span id="sp" style="color: red; font-size:14px;"></span>
    </div>
</div>


<?php


$x=0;
if (isset($_POST['login'])) {
if(!empty($_POST['email']) || !empty($_POST['password']) ){

	try {
	$pdo=new PDO("mysql:host=localhost;dbname=labofsdm","root","");
} catch (Exception $e) {
	echo $e->getMessage();
}
$req="select * from admin";
$stmt=$pdo->query($req);
foreach ($stmt as $row) {
	if($row['Email']==$_POST['email'] && $row['password']==$_POST['password']){
        $x=1;
        break;
	}
}
if ($x==1) {
	
$_SESSION['admin']=$_POST['email'];

	echo '<script>
  window.location="home.php";
	</script>';
}else{
	echo '<script>
	document.getElementById("sp").innerHTML="mot de passe ou email est incorrect";
	</script>';
}

}else{
	echo '<script>
	document.getElementById("sp").innerHTML="Entrer tous les champs";
	</script>';
}
}

if (isset($_POST['annuler'])) {
	echo '<script>
	window.location="../index.html";
	  </script>';
}



?>



<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Moment JS -->
<script src="bower_components/moment/moment.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Active Script -->
<script>
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;
  
  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
      return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //CK Editor
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
  });
</script>


</body>
</html>

