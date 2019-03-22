
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
<br><br>
<?php 
$res = find_competition_by_id($_GET['competition_id']);
$row = mysqli_fetch_assoc($res); 
?>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<div class="form-group">
<form method="post" action="update_competition.php?competition_id=<?php echo $_GET['competition_id']; ?>" name="add_name" id="add_name">
   <div class="col">
   <label>Title</label>
     <input type="text" name="title" class="form-control" value="<?php echo $row['name'];?>" required>
   </div>
   <div class="col">
   <label>Description</label>
     <textarea name="description" class="form-control" value="<?php echo $row['description']; ?>"><?php echo $row['description']; ?></textarea>
   </div>
   <div class="col">
   <label>Status</label>
     <select name="status" class="form-control" required>

         <option value="<?php echo $row['status'] ?>">
         <?php if($row['status'] == 1){
          echo "Active";
          }else{
            echo "Inactive";
            } ?>
         </option>
         <option>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</option>
         <option value="1">Active</option>
         <option value="2">Inactive</option>
     </select>
   </div><br>
   <input type="submit" name="submit" class="btn btn-primary">
</form>
 </div>
</div>
</div>
      
  </div>
  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
