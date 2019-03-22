  <?php include("../connection.php"); ?>
  <?php include("../includes/functions.php"); ?>
  <?php include("../includes/header.php"); ?>
  <?php include("../includes/navigation.php"); ?>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Admin Page
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
                     <form method="post" action="upload.php"  enctype="multipart/form-data">
                        <div class="col">
                        <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col">
                        <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col">
                        <label>Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="col">
                        <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col">
                        <label>Image</label>
                          <input type="file" name="myimage" class="form-control">
                        </div>
                        <input type="hidden" name="type" class="form-control" value="1">

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
              $res = find_account(1);
              ?>
              <?php while($row = mysqli_fetch_assoc($res)){ ?>
                <tr>
                  <td><?php echo $row['fname']. " " . $row['lname']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><input type="password" class="no-border" value="<?php echo $row['password']; ?>" readonly></td>
                  <td>
                    <center>
                    <a href="edit.php?account_id=<?php echo $row['account_id']; ?>&type_id=<?php echo $row['type_id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="remove.php?account_id=<?php echo $row['account_id']; ?>&type_id=<?php echo $row['type_id']; ?>" class="btn btn-danger">Remove</a>
                    </center>
                  </td>
                </tr>
              <?php }
              free_result($res);
              ?>

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
