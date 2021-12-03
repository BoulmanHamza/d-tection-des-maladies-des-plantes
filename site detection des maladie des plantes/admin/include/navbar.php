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
            <img src="image/male2.png"  class="user-image" alt="User Image">
            <span class="hidden-xs" style="text-transform: uppercase;"><small><?php echo $prenom." ".$nom   ?></small></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="image/male2.png" class="img-circle" alt="User Image">

              <p>
                <?php
                echo $prenom." ".$nom 
                ?>
                <small>Member Depuis: <?php echo $date_member?></small>
              </p>
            </li>
            <li class="user-footer">
            <form method="post" action="">
              <div class="pull-left">
                <a href="" data-toggle="modal" data-target="#modifierprofile" id="admin_profile"><button class="btn btn-default btn-flat" >Modifier</button></a>
              </div>
              <div class="pull-right">
                <button class="btn btn-default btn-flat" name="deco">Se Déconnecter</button>
              </div>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
