  <?php include("../connection.php"); ?>
  <?php include("../includes/functions.php"); ?>
  <?php include("../includes/header.php"); ?>
  <?php include("../includes/navigation.php"); ?>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tabulator Page
        <small>Admin Accounts</small>
      </h1>
    </section>
      <!-- START HERE -->
    <!-- Main content -->
    <br >
    <div class="box-body">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                Add Account
              </button>
<?php if(isset($_SESSION['message'])){
  ?>
  <br><br>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i>Alert!</h4>
    <?php echo $_SESSION['message']; ?>
  </div>
<?php
  session_unset($_SESSION['message']);
  }
?>

              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                     <!-- Content of Modal -->
                     <div class="form-group">
                     <form method="post" action="add_tab.php"  enctype="multipart/form-data">
                        <div class="col">
                        <?php $comp = find_competition(); ?>
                            <label>Competition</label>
                            <select class="form-control" name="competition">

                            <option>--Pick Active Competitions--</option>
                        <?php while($row = mysqli_fetch_assoc($comp)){ ?>
                              <option value="<?php echo $row['competition_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                            </select>
                        <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col">
                        <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name">
                        </div>
                        <!-- <div class="col">
                        <label>Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="col">
                        <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password">
                        </div> -->

                     </div>
                     <!-- Content of Modal -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <input type="submit" name="submit" class="btn btn-primary">
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
    </div>

 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th class="text-center">Action</th>
                </tr>
              <?php
              $res = find_tab();
              ?>
              <?php while($row = mysqli_fetch_assoc($res)){ ?>
                <tr>
                  <td><?php echo ucfirst($row['fname']). " " . ucfirst($row['lname']); ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['password']; ?></td>
                  <td>
                    <center>
                    <a href="edit_tabulator.php?tabulator_id=<?php echo $row['tabulator_id']; ?>&competition_id=<?php echo $row['competition_id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="remove_tabulator.php?tabulator_id=<?php echo $row['tabulator_id']?>" class="btn btn-danger">Remove</a>
                    </center>
                  </td>
                </tr>
              <?php } ?>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
