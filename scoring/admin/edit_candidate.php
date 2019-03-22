
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
    <div class="form-group">
    <form method="post" action="update_candidate.php?candidate_id=<?php echo $_GET['candidate_id']; ?>"  enctype="multipart/form-data" name="add_name" id="add_name">
       <div class="col">
       <?php $comp = find_competition_by_status(1); ?>
       <?php $gg = find_competition_by_id($_GET['competition_id']); 
         $kk = mysqli_fetch_assoc($gg);
       ?>
           <label>Competition</label>
           <select class="form-control" name="competition">
           <option value="<?php echo $kk['competition_id']; ?>"><?php echo $kk['name']; ?></option>
           <option>--Pick Active Competitions--</option>
       <?php while($row = mysqli_fetch_assoc($comp)){ ?>
             <option value="<?php echo $row['competition_id']; ?>"><?php echo $row['name']; ?></option>
       <?php } ?>
           </select>
       <?php mysqli_free_result($comp); ?>
       <?php $res = find_candidates_by_id($_GET['candidate_id']); 
              $cand = mysqli_fetch_assoc($res);
       ?>
       <div class="col">
       <label>Candidate #</label>
         <input type="number" name="candidate_num" class="form-control" placeholder="Candidate #" value="<?php echo $cand['candidate_number']; ?>" required>
       </div>
       <div class="col">
       <label>Representing</label>
         <input type="text" name="representing" class="form-control" placeholder="Representing" value="<?php echo $cand['representing']; ?>" required>
       </div>
       <label>First Name</label>
         <input type="text" name="fname" class="form-control" placeholder="Firstname" value="<?php echo $cand['fname']; ?>" required>
       </div>
       <div class="col">
       <label>Last Name</label>
         <input type="text" name="lname" class="form-control" placeholder="Lastname" value="<?php echo $cand['lname']; ?>" required>
       </div>
       <div class="col">
       <label>Age</label>
         <input type="number" name="age" placeholder="Age" class="form-control" value="<?php echo $cand['age']; ?>" required>
       </div>
       <div class="col">
       <label>Gender</label>
         <select class="form-control" name="gender" required >
           <option value="<?php echo $cand['gender']; ?>"><?php echo $cand['gender']; ?></option>
           <option>------</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
         </select>
       </div>
       <div class="col">
       <label>Image</label><br>
          <img src="<?php echo $cand['image_path'],$cand['image']; ?>" class="img-thumbnail" width="200px" height="200px">
         <input type="file" name="myimage" class="form-control">
       </div><br>
       <input type="submit" value="submit" name="submit" class="btn btn-primary">
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
  
