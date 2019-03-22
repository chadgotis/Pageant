  <?php include("../includes/header.php"); ?>
  <?php include("../includes/functions.php"); ?>
  <?php include("../includes/navigation.php"); ?>


  <div class="content-wrapper">
    <section class="content-header">
      <!-- START HERE -->
      <h1>
        Edit page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
<?php
$res = find_tab_by_id($_GET['tabulator_id']);
?>

    <!-- Main content -->
    <section class="content">
    <form action="update_tabulator.php?tabulator_id=<?php echo $_GET['tabulator_id']; ?>" method="post" enctype="multipart/form-data">
             <legend class="text-center">Basic Information</legend>
             <div class="form-group">
             <?php while($row = mysqli_fetch_assoc($res)){ ?>
                  <div class="col">
                   <select class="form-control" name="competition">
                     <?php $cc = find_competition_by_status(1);?>
                     <?php $gg = find_competition_by_id($_GET['competition_id']); 
                       $kk = mysqli_fetch_assoc($gg);
                     ?>
                     <option value="<?php echo $kk['competition_id']; ?>"><?php echo $kk['name']; ?></option>

                     <?php while($comps = mysqli_fetch_assoc($cc)){
                     ?>
                     <option value="<?php echo $comps['competition_id']; ?>"><?php echo $comps['name']; ?></option>
                     <?php } ?>
                   </select>
                  </div>
                   <div class="col">
                   <label>First Name</label>
                     <input type="text" name="fname" class="form-control" placeholder="First name" value="<?php echo $row['fname']; ?>" required>
                   </div>
                   <div class="col">
                   <label>Last Name</label>
                     <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $row['lname']; ?>" required>
                   </div>
                   <div class="col">
                   <label>Username</label>
                     <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>" required>
                   </div>
                   <div class="col">
                   <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                   </div>
                   <br>
                   <div class="col">
                   <input type="submit" method="submit" name="submit" value="Submit" class="btn btn-success">
                   </div>
              <?php } ?>
             </div>
           </fieldset>

         </div>
       </div>


             </form>
<?php free_result($res); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
