
  <?php include("../includes/header.php"); ?>

<?php include("../connection.php"); ?>
<?php include("../includes/functions.php"); ?>

  <?php include("../includes/navigation.php"); ?>

<?php if(isset($_POST['submit'])){
  $a = $_POST['title'];
  $b = $_POST['description'];
  $c = $_POST['status'];

  $res = add_competition($a,$b,$c);
} ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Candidates Page
        <small>Candidate List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
      <!-- START HERE -->
    <!-- Main content -->
    <br >
    <div class="box-body">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                Add Candidate
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
                      <h4 class="modal-title">Add Candidate</h4>
                    </div>
                    <div class="modal-body">
                     <!-- Content of Modal -->
                     <div class="form-group">
                     <form method="post" action="add_candidate.php"  enctype="multipart/form-data" name="add_name" id="add_name">
                        <div class="col">
                        <?php $comp = find_competition_by_id($_GET['competition_id']); 
                              $row = mysqli_fetch_assoc($comp);?>
                            <label>Competition</label>
                            <select class="form-control" name="competition" readonly>
                            <option value="<?php echo $row['competition_id']; ?>"><?php echo $row['name']; ?></option>
                            </select>
                        <?php mysqli_free_result($comp); ?>
                        <div class="col">
                        <label>Candidate #</label>
                          <input type="number" name="candidate_num" class="form-control" placeholder="Candidate #" required>
                        </div>
                        <div class="col">
                        <label>Representing</label>
                          <input type="text" name="representing" class="form-control" placeholder="Representing" required>
                        </div>
                        <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="Firstname" required>
                        </div>
                        <div class="col">
                        <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Lastname" required>
                        </div>
                        <div class="col">
                        <label>Age</label>
                          <input type="number" name="age" placeholder="Age" class="form-control" required>
                        </div>
                        <div class="col">
                        <label>Gender</label>
                          <select class="form-control" name="gender" required >
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                        <div class="col">
                        <label>Image</label>
                          <input type="file" name="myimage" class="form-control">
                        </div>
                      

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
              <h3 class="box-title">Candidates Table</h3>

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
            <?php $res = find_candidates_by_comp($_GET['competition_id']); ?>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Candidate #</th>
                  <th>Name</th>
                  <th>Representing</th>
                  <th>Age</th>
                  <th class="pull-right">Action</th>
                </tr>
                  <?php while($row = mysqli_fetch_assoc($res)){ ?>
                <tr>

                  <td><?php echo $row['candidate_number']; ?></td>
                  <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                  <td><?php echo $row['representing']; ?></td>
                  <?php $id = $row['competition_id']; ?>
                  <td><?php echo $row['age']; ?></td>
                  <td>
                  
                  </td>
                  <td>
                    <center>
                    <a href="edit_candidate.php?candidate_id=<?php echo $row['candidate_id']; ?>&competition_id=<?php echo $row['competition_id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="remove_candidate.php?candidate_id=<?php echo $row['candidate_id']; ?>" class="btn btn-danger">Remove</a>
                    </center>
                  </td>

                </tr>
                <?php }
                mysqli_free_result($res);
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
