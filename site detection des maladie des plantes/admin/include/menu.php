


<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="image/male2.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php
                echo $prenom." ".$nom 
                ?>
        </p>
       <a><i class="fa fa-circle text-success"></i> En ligne</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Générale</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Table de Bord</span></a></li>
     
      <li class="header">MANAGE</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>User</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
           <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
          <li><a href="commantaire.php"><i class="fa fa-comment"></i> Commantaire</a></li>
        </ul>
      </li>







     
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Plantes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="plante.php"><i class="fa fa-circle-o"></i> Listes des Plantes</a></li>
          <li><a href="catg_plante.php"><i class="fa fa-circle-o"></i> Categorie</a></li>
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
          <li><a href="maladie.php"><i class="fa fa-circle-o"></i> Listes des Maladies</a></li>
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
          <li><a href="traitement.php"><i class="fa fa-circle-o"></i> Listes des Traitements</a></li>
        </ul>
      </li>
      <li><a href="dossier_medical.php"><i class="fa fa-folder"></i> <span>Dossier Medical</span></a></li>
    </ul>
  </section>
</aside>