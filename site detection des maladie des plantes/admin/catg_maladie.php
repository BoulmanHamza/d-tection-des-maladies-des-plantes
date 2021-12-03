<!DOCTYPE html>
<html>
<head>
	<title>SMART AGRICULTURE</title>

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
  	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	
	<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>S</b>A</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SMART</b>AGRICULTURE</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="image/male2.png" class="user-image" alt="User Image">
            <span class="hidden-xs">Hamza Boulman</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="image/male2.png" class="img-circle" alt="User Image">

              <p>
                Hamza Boulman
                <small>Member Depuis: 20/10/2020</small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Modifier</a>
              </div>
              <div class="pull-right">
                <a href="../logout.php" class="btn btn-default btn-flat">Se Déconnecter</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>


<!-- Description -->
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter Catégorie </b></h4>
            </div>
             <form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">Nom catégorie </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
				
               
                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo">
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="description" rows="10" cols="140" required></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
            </div>
            </form> 
        </div>
    </div>
</div>

<!-- Update Photo -->

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="image/male2.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Hamza Boulman</p>
        <a><i class="fa fa-circle text-success"></i> En ligne</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Générale</li>
      <li><a href="home.html"><i class="fa fa-dashboard"></i> <span>Table de Bord</span></a></li>
     
      <li class="header">MANAGE</li>
      <li><a href="users.html"><i class="fa fa-users"></i> <span>Users</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
         <span>Plantes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="plante.html"><i class="fa fa-circle-o"></i> Listes des Plantes</a></li>
          <li><a href="catg_plante.html"><i class="fa fa-circle-o"></i> Categorie</a></li>
        </ul>
      </li>
	  <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Maladies</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="maladie.html"><i class="fa fa-circle-o"></i> Listes des Maladies</a></li>
          <li><a href="catg_maladie.html"><i class="fa fa-circle-o"></i> Categorie</a></li>
        </ul>
      </li>
	  <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Traitement </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="traitement.html"><i class="fa fa-circle-o"></i> Listes des Traitements</a></li>
          <li><a href="catg_trait.html"><i class="fa fa-circle-o"></i> Categorie</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>











<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	
  	<section class="content-header">
      <h1>
       Listes Des Catégories Maladies 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="#">Plante</li>
		<li class="active">Catégorie des Maladies</li>
      </ol>
    </section>


    <section class="content">
      <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            
        <div class="row">
        	
        	
          <table id="example1" class="table table-bordered">
                <thead>
                  <th>Nom Catégorie</th>
                  <th>Photo</th>
                  <th>Description </th>
					<th>Outils</th>
                </thead>
                <tbody>
                 
                         <tr>
                            <td>Caté01</td>
                            <td>
                              <img src='image/p1.jpg' height='30px' width='30px'>
                              </td>
                            <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' ><i class='fa fa-search'></i> View</a></td>
                               <td>
                              <button class='btn btn-success btn-sm edit btn-flat' ><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' ><i class='fa fa-trash'></i> Supp</button>
                            </td>
                          </tr>
                           

                </tbody>
              </table>



        </div>
  </div>
</div>



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