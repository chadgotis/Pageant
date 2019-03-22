
  <?php include("../includes/header.php"); ?>
<?php include("../connection.php"); ?>
<?php include("../includes/functions.php"); ?>
  <?php include("../includes/navigation.php"); ?>
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
                    <a href="result.php?competition_id=<?php echo $row['competition_id']; ?>" class="btn bg-purple" title="View Criteria"><i class="fa fa-eye"></i> View </a>
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
