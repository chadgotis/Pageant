
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
if(isset($_POST['submit'])){
$name = $_POST['name'];
$value = $_POST['value'];
$comp = $_GET['competition_id'];

$name = mysqli_real_escape_string($conn,$name);
$value = mysqli_real_escape_string($conn,$value);

$query = "UPDATE criteria SET name ='{$name}', max_value = '{$value}' WHERE criteria_id =".$_GET['criteria_id'];
$ress = mysqli_query($conn, $query);
}
?>
    <!-- Main content -->
    <section class="content">
    <form action="" method="post" enctype="multipart/form-data">
             <legend class="text-center">Edit Criteria</legend>
             <div class="form-group">
                 <div class="col">
                 <?php  
                  $query = "SELECT * FROM criteria WHERE criteria_id =".$_GET['criteria_id']." AND competition_id =".$_GET['competition_id'];
                  $res = mysqli_query($conn, $query);
                  while($crit = mysqli_fetch_assoc($res)){
                 ?>
                   <label>Criteria Name</label>
                     <input type="text" name="name" class="form-control" placeholder="First name" value="<?php echo ucfirst($crit['name']); ?>" required>
                   </div>
                   <div class="col">
                   <label>Percentage</label>
                     <input type="text" name="value" class="form-control" placeholder="Last Name" value="<?php echo $crit['max_value']; ?>" required>
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
