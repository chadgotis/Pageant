  <?php include("../connection.php"); ?>
  <?php include("../includes/functions.php"); ?>
  <?php include("../includes/header.php"); ?>
  <?php include("../includes/navigation.php"); ?>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Judge Page
        <small>Admin Accounts</small>
      </h1>
    </section>
      <!-- START HERE -->
    <!-- Main content -->


 <div class="row">
 <div class="col-md-1"></div>
 <div class="col-md-10">
  <form method="post" action="update_judge.php?judge_id=<?php echo $_GET['judge_id']; ?>">
      <div class="col">
   <?php $aa = find_competition_by_id($_GET['competition_id']); 
         $row = mysqli_fetch_assoc($aa);
   ?>

   <?php $comp = find_competition_by_status(1); ?>
       <label>Competition</label>
       <select class="form-control" name="competition">
       <option value="<?php echo $row['competition_id']; ?>"><?php echo $row['name']; ?></option>
       <option>--Pick Active Competitions--</option>
   <?php while($row = mysqli_fetch_assoc($comp)){ ?>
         <option value="<?php echo $row['competition_id']; ?>"><?php echo $row['name']; ?></option>
   <?php } ?>

   <?php mysqli_free_result($comp); ?>
   <?php 
   $qq = find_judge_by_id($_GET['judge_id']); 
   $row = mysqli_fetch_assoc($qq);
   ?>
     </select>
     </div>
     <div class="col">
     <label>First Name</label>
       <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>">
     </div>
     <div class="col">
     <label>Last Name</label>
       <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>">
     </div>
     <div class="col">
     <label>Username</label>
       <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
     </div>
     <div class="col">
     <label>Password</label>
       <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
     </div><br>
      <input type="submit" name="submit" class="btn btn-primary">
  </div>
  <!-- Content of Modal -->
  
   </form>
  </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
