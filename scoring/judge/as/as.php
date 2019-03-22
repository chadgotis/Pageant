
  <?php include("../connection.php"); ?>
  <?php include("../includes/functions.php"); ?>
  <?php include("../includes/judge_header.php"); ?>



<?php 
//crit count
$count = $_SESSION['count'];
$i = 1;
?>
<div class="content-wrapper">
  <section class="content-header">
    <!-- START HERE -->
    <h1>
      <?php echo $_SESSION['competition_name']; ?>
      <?php $j = find_judge_name($_SESSION['user'],$_SESSION['pass']); 
            $judge = mysqli_fetch_assoc($j);
      ?>
      <small class="pull-right">Welcome <?php echo $judge['fname']." ".$judge['lname'];  ?></small>
    </h1>
  </section>
  <br>
 
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
              if(isset($_POST['submit']) AND is_array($_POST['crit_id'])){
                 $criterion = $_POST['criterion'];
                 $competition_id = $_SESSION['competition_id'];
                 $judge_id = $_SESSION['judge_id'];
                 $candidate_id = $_POST['candidate_id'];
                 $crit_id = $_POST['crit_id'];

                   foreach($criterion as $criteria){
                    $id = current($crit_id);
                    $cand = current($candidate_id);
                   $query = "INSERT INTO score(competition_id,candidate_id, judge_id, criteria_id, score) VALUES ({$competition_id},{$cand},{$judge_id},{$id},{$criteria})";
                   $asd = mysqli_query($conn, $query);
                    $id = next($crit_id);
                    $cand = next($candidate_id);
                 }
                 $query = "UPDATE judge SET availability = 1 WHERE judge_id =".$judge_id;
                 $avail = mysqli_query($conn, $query);
                 
                 header("Location:logout.php");
               }
              ?> 
             <form method="post" action="submit.php">
             <div class="box-body table-responsive no-padding">
               <table class="table table-hover"  border="1px;">
               <tbody>
                <tr>
                  <th>Candidate #</th>
                  <th>Image</th>
                  <th>Full Name</th>
                  <th>Representing</th>

                  <?php $crit_n = find_criteria_by_id($_SESSION['competition_id']); ?>
                  <?php while($row = mysqli_fetch_assoc($crit_n)){ ?>
                  <th><?php echo $row['name']. " " .$row['max_value']; ?>%</th>
                  <?php $max = $row['max_value']; ?>
                  <?php } ?>
                  <?php free_result($crit_n); ?>
                  <th>Total Score</th>
                  </tr>


                  <?php $cand = find_candidates_by_comp($_SESSION['competition_id']); ?>
                  <?php while($row = mysqli_fetch_assoc($cand)){?>
                <tr>
                  <td><h2 class="lead"><?php echo $row['candidate_number']; ?></h2></td>
                  <td><a href="<?php echo "../admin/uploads/".$row['image']; ?>" data-lightbox="image-1"  data-title="<?php echo "Candidate #"." ".$row['candidate_number'].": ".$row['fname'].' '.$row['lname']; ?>"> <img src="<?php echo "../admin/uploads/".$row['image']; ?>" class="img-thumbnail" width="50px" height="50px"></a> </td>
                  <td><p class="name"><?php echo ucfirst($row['fname']).' '.ucfirst($row['lname']); ?></p></td>
                  <td><?php echo $row['representing']; ?></td>
                  <?php $c = $row['candidate_id'];?>
                          <?php $crit_id = find_criteria_by_id($_SESSION['competition_id']);?>
              <?php while($row = mysqli_fetch_assoc($crit_id)){ ?>
                                <?php $i++; ?>
                                <input type="hidden" name="crit_id[]" class="score" value="<?php echo $row['criteria_id']; ?>">
                                <td><input class="calc" type="number" step=".01" name="criterion[]" placeholder="Score" max="<?php echo $row['max_value']; ?>" onkeyup="updatesum()" onkeydown="updatesum()"></td>
                                <input type="hidden" value="<?php echo $c; ?>" name="candidate_id[]" readonly="readonly">
                            <?php } ?>

                            <td class="result"></td>
                </tr>
                  <?php } ?>

                  <?php free_result($cand); ?>

                  </tbody>
               </table>

             </div>
             <input type="submit" value="submit" name="submit" class="btn btn-success btn-block">
            </form>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
         </div>
       </div>
  <!-- /.content -->
</div>
<?php include("../includes/judge_footer.php"); ?>