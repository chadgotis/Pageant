
  <?php include("../includes/header.php"); ?>

  <?php include("../includes/functions.php"); ?>

  <?php include("../includes/navigation.php"); ?>


  <div class="content-wrapper">
    <section class="content-header">
      <!-- START HERE -->
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="col">
          <label>Criteria</label>
          <table class="table table-hover">
              
          <tr>
            <th>Criteria Name</th>
            <th>Percentage %</th>
            <th class="text-center">Action</th>
          </tr>
          <tr>
          <?php $res = find_criteria_by_id($_GET['competition_id']); ?>
          <?php while($row = mysqli_fetch_assoc($res)){ ?>
          <tr>

            <td><?php echo $row['name'];  ?></td>
            <td><?php echo $row['max_value'];  ?>%</td>
            <td class="text-center">
              <a href="edit.php?criteria_id=<?php echo $row['criteria_id'];  ?>&competition_id=<?php echo $_GET['competition_id']; ?>" class="btn btn-warning">edit</a>
              <a href="remove_criteria.php?criteria_id=<?php echo $row['criteria_id'];  ?>&competition_id=<?php echo $_GET['competition_id']; ?>" class="btn btn-danger">remove</a>
            </td>
 
          </tr>
         <?php } ?>
          </table>
        </div>
        <?php if(isset($_POST['submit'])){
          $comp_id = $_GET['competition_id'];
          $res = add_criteria($_GET['competition_id']);
          header_to("view_criteria.php?competition_id=<?php echo $comp_id;?>");
        } ?>
<div class="row">
        <form method="post" action="add_criteria" name="add_name" id="add_name">
          <div class="col">
            <label>Add Criteria</label>
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                  <td><input type="text" placeholder="Enter Name" name="name[]" id="name" class="form-control name_list"></td>
                  <td><input type="number" placeholder="Enter Total Percentage" name="max[]" id="max" class="form-control name_list"></td>
                  <td><input type="hidden" name="competition_id[]" id="competition_id" class="form-control name_list" value="<?php echo $_GET['competition_id']; ?>"></td>
                  <td><button type="button" class="btn btn-success" name="add" id="add">Add More</button></td>
                </tr>
            </table>
                <input type="button" name="submit" id="submit" value="Submit">
          </div>

        </form>
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
  
