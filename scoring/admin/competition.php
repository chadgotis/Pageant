
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
        Competition Page
        <small>Competition List</small>
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
                Add Competition
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
                      <h4 class="modal-title">Add Competition</h4>
                    </div>
                    <div class="modal-body">
                     <!-- Content of Modal -->
                     <div class="form-group">
                     <form method="post" action="competition.php"  enctype="multipart/form-data" name="add_name" id="add_name">
                        <div class="col">
                        <label>Title</label>
                          <input type="text" name="title" class="form-control" placeholder="Title" required>
                        </div>
                        <div class="col">
                        <label>Description</label>
                          <textarea name="description" class="form-control" placeholder="Description"></textarea>
                        </div>
                        <div class="col">
                        <label>Status</label>
                          <select name="status" class="form-control" required>

                              <<option value="1">Active</option>
                              <option value="2">Not Active</option>

                          </select>
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
              <h3 class="box-title">Competition Table</h3>

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
            <?php $res = find_competition(); ?>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th></th>
                  <th>Availability</th>
                  <th class="text-center">Action</th>
                </tr>
                  <?php while($row = mysqli_fetch_assoc($res)){ ?>
                <tr>

                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td></td>
                  <td>
                      <?php if($row['status'] == 1){
                        echo "Active";
                      }else{
                        echo "Inactive";
                      }
                      ?>
                  </td>
                  <td>
                    <center>
                    <a href="view_candidate.php?competition_id=<?php echo $row['competition_id']; ?>" class="btn btn-info" title="Candidates"><i class="fa fa-users"></i></a>
                    <a href="edit_competition.php?competition_id=<?php echo $row['competition_id']; ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil-square"></i></a>
                    <a href="view_criteria.php?competition_id=<?php echo $row['competition_id']; ?>" class="btn bg-purple" title="View Criteria"><i class="fa fa-eye"></i></a>
                    <a href="add_criteria.php?competition_id=<?php echo $row['competition_id']; ?>" class="btn btn-success" title="Add Criteria"><i class="fa fa-plus-square"></i></a>
                    <a href="remove.php?competition_id=<?php echo $row['competition_id']; ?>" onclick="return confirmDelete()" class="btn btn-danger" title="Remove"><i class="fa fa-remove"></i></a>
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
      <!--
      $string = strip_tags($string);

if (strlen($string) > 10) {

    // truncate string
    $stringCut = substr($string, 0, 10);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="/this/story">Read More</a>';
     -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
