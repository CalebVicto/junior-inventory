<?php
	if (!isset($con)){
		exit;
	}
?>
        <!-- Logo -->
    
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a> -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/admin.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['full_name'];  ?></span>
                </a>
                <ul class="dropdown-menu">
				
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/admin.png" class="img-circle" alt="User Image">
                    <p>
						<?php echo $_SESSION['full_name']; ?>		
                      <small>Usuario</small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="col-12">
                      <a href="login.php?logout" class="btn btn-danger btn-flat"><i class='fa fa-power-off'></i> Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>