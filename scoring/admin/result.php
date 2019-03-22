
  <?php include("../includes/header.php"); ?>


  <?php include("../includes/functions.php"); ?>
  <?php include("../includes/navigation.php"); ?>


  <div class="content-wrapper">


    <!-- Main content -->
   <?php 
      $query = "SELECT * FROM competition where competition_id=".$_GET['competition_id'];
      $ress = mysqli_query($conn, $query);
      $yah = mysqli_fetch_assoc($ress);
      $comp = $_GET['competition_id'];
            $jc = count_judge_by_comp($comp); 
            $jcount = mysqli_fetch_assoc($jc);

            $judges = $jcount['jcount']; 
?>
  <div class="row">
         <div class="col-xs-12">
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">Competition name: <?php echo ucfirst($yah['name']); ?></h3>

              
             </div>
             <form method="post" action="home.php">
             <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                <tr>
                  <th>Number</th>
                  <th>Candidate Name</th>
                  <?php  
                    $query = "SELECT * FROM judge WHERE competition_id =".$_GET['competition_id'];
                    $res = mysqli_query($conn, $query);
                  ?>
                  <?php while($jname = mysqli_fetch_assoc($res)){ ?>
                    <?php  ?>
                    <th><?php echo $jname['fname']." ".$jname['lname']; ?></th>
                  <?php } ?>
                  <th>Total Average</th>
                </tr>
                <?php 
                $cand = find_candidates_by_comp($comp); 
                while($candidate = mysqli_fetch_assoc($cand)){
                ?>
                <tr>
                <td><?php echo $candidate['candidate_number']; ?></td>
                <td><?php echo $candidate['fname']." ".$candidate['lname']; ?></td>
                <?php 
                $query = "SELECT judge_id FROM judge WHERE competition_id =".$comp; 
                $jid = mysqli_query($conn, $query);
                while($jj = mysqli_fetch_assoc($jid)){
                ?>
                  <?php  
                    $query = "SELECT ROUND(SUM(score), 2) as sum FROM score INNER JOIN judge on score.judge_id = judge.judge_id AND candidate_id =".$candidate['candidate_id']." AND score.judge_id =".$jj['judge_id'];
                    $ress = mysqli_query($conn, $query);
                    while($score = mysqli_fetch_assoc($ress)){
                  ?>
                  <td><?php echo $score['sum']." %"; ?></td>
                  <?php } ?>

                  <?php } ?>

                  <?php 
                    $query = "SELECT SUM(score)/".$judges." as total FROM score WHERE candidate_id =".$candidate['candidate_id'];
                    $resss = mysqli_query($conn, $query);
                    while($tot = mysqli_fetch_assoc($resss)){
                  ?>
                  <td><?php echo ROUND($tot['total'], 2); ?>%</td>
                  <?php } ?>
                <tr>
                <?php } ?>

               </table>
            </div>
          </form>
          <br>
          <center>
                    <button onclick="printPage()" class="btn btn-warning hidden-print">Print Result</button>
          </center>
        </div>
        </div>
        </div>

</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
  
