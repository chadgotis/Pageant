  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['path'].$_SESSION['image']; ?>" class="img-circle" alt="User Image"><br><br>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['first']." ".$_SESSION['last']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="home.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if($_SESSION['type'] == 4){ ?>
            <li><a href="admin.php"><i class="fa fa-circle-o"></i>Administrator</a></li>
          <?php } ?>
            <li><a href="tabulator.php"><i class="fa fa-circle-o"></i>Tabulator</a></li>
            <li><a href="judges.php"><i class="fa fa-circle-o"></i>Judges</a></li> 
          </ul>
        </li>
        <li>
          <a href="competition.php">
            <i class="fa fa-pencil-square-o"></i> <span>Competitions</span>
          </a>
        </li>
        <li>
          <a href="candidate.php">
            <i class="fa fa-users"></i> <span>Candidates</span>
          </a>
        </li>
        <li>
          <a href="gallery.php">
            <i class="fa fa-camera"></i> <span>Photo Gallery</span>
          </a>
        </li>
        <li>
          <a href="reports.php">
            <i class="fa fa-file-text"></i> <span>Reports</span>
          </a>
        </li>
        <li><a href="#"><i class="fa fa-book"></i> <span>About</span></a></li>

       <!-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
      -->
    </section>
    <!-- /.sidebar -->
  </aside>