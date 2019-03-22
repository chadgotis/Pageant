
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
               <table class="table table-hover">
               <tbody>
                <tr>
                  <th width="5%">Candidate #</th>
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
                                <td><input class="input-sm" type="number" step=".01" name="criterion[]" placeholder="Score" min="1" max="<?php echo $row['max_value']; ?>" onkeyup="updatesum()" onkeydown="updatesum()" required></td>
                                <input type="hidden" value="<?php echo $c; ?>" name="candidate_id[]" readonly="readonly">
                            <?php } ?>

                            <td class="result lead"></td>
                </tr>
                  <?php } ?>

                  <?php free_result($cand); ?>

                  </tbody>
               </table>
                   <script type="text/javascript">
                       $('tr input').on('input', function() {
                 var inputs = $(this).parent('td').siblings('td').andSelf().find('input');
                 
                 var values = inputs.map(function() { return Number($(this).val())}).get();
                 
                 var sum = values.reduce((a, b) => { return a + b});
                 
                  var result = $(this).parent().siblings('.result');
                 
                 (isNaN(sum)) ? result.text('Numbers only') : result.text(sum);
               })
                   </script>

             </div>
             <center>
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
               Submit!
             </button>
             </center>
             <div class="modal modal-danger fade" id="modal-default">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Score Submission</h4>
                   </div>
                   <div class="modal-body">
                    <!-- Content of Modal -->
                   <p>Are you sure to submit the current scores? Once you submitted, you can never edit the score you inserted? Please Kindly Double Check your inputs.</p>
                    <!-- Content of Modal -->
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                     <input type="submit" name="submit" value="Submit" class="btn btn-danger">
                     </form>
                   </div>
                 </div>
            </form>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
         </div>
       </div>
  <!-- /.content -->
</div>
<?php include("../includes/judge_footer.php"); ?>
