<?php session_start(); ?>
<?php include("../connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/judge_header.php"); ?>
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
  <br>
  <?php 
    $query = "SELECT * FROM criteria WHERE competition_id =".$_SESSION['competition_id'];
    $res = mysqli_query($conn,$query);
    $crit = array();
    while($row = mysqli_fetch_assoc($res)){
      $crit[] = $row;
    }
  ?>
  <!-- <pre><?php echo print_r($crit); ?></pre> -->
  <?php mysqli_free_result($res); ?>
  <!-- Main content -->
 
  <div class="row">
         <div class="col-xs-12">
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">Judge Scoring Sheet</h3>

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
             <?php 
             if(isset($_POST['submit']) && is_array($_POST['criterion'])){
                $criterion = $_POST['criterion'];
                $competition_id = $_SESSION['competition_id'];
                $judge_id = $_SESSION['judge_id'];
                $crit_id['criteria_id'] = $_POST['criteria_id'];

               
          
                  foreach($crit_id as $yeah){ 
                    $row = implode($crit_id['criteria_id']);
                  foreach($criterion as $criteria){
                  $query = "INSERT INTO score(competition_id, judge_id, criteria_id, score) VALUES ({$competition_id},{$judge_id},{$row},{$criteria})";
                  $asd = mysqli_query($conn, $query);
              }
            }
            

             ?> 
             <pre><?php print_r($criterion); ?></pre>
             <pre><?php print_r($crit_id); ?></pre>
             <?php  }   ?>
             <form method="post" action="home.php">
             <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                 <tr>
                  <th>Candidate #</th>
                  <th>Full Name</th>
                  <th>Representing</th>
                  <?php 

                  $query = "SELECT * FROM criteria WHERE competition_id =".$_SESSION['competition_id'];
                  $ress = mysqli_query($conn, $query);
                  ?>
                  <?php 

                  $query = "SELECT criteria_id FROM criteria WHERE competition_id =".$_SESSION['competition_id'];
                  $resss = mysqli_query($conn, $query);
                  ?>
                  <?php while($rows = mysqli_fetch_assoc($ress)){ ?>
                  <th width="10%"><?php echo $rows['name']; ?></th>
                  <?php } ?>
                 </tr>
                 <?php 

                 $query = "SELECT * FROM candidate WHERE competition_id =".$_SESSION['competition_id'];
                 $res = mysqli_query($conn, $query);

                 ?>
                 <?php while($row = mysqli_fetch_assoc($res)){ ?>
                 <tr>
                   <td><?php echo $row['candidate_number']; ?></td>
                   <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                   <td><?php echo $row['representing']; ?></td>
                    <?php 
                    $count = $_SESSION['count'];
                      for($i = 0; $i < $count; $i++ ){
                    ?>
                    <input type="hidden" name="criteria_id[]">
                    <td width="10%"><input type="number" name="criterion[]" class="form-control"></td>

                    <?php } ?>
                 </tr>
                 <?php } ?>
               </table>
             </div>
             <input type="submit" value="submit" name="submit">
            </form>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
         </div>
       </div>
  <!-- /.content -->
</div>

<?php include("../includes/judge_footer.php"); ?>