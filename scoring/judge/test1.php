<?php session_start(); ?>
<?php include("../connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/judge_header.php"); ?>
<div class="content-wrapper">
<?php 
      $count = 6;
      $jc = count_judge_by_comp($count); 
      $jcount = mysqli_fetch_assoc($jc);

      $judges = $jcount['jcount']; 
      $comp = 6;
?>
  <div class="row">
         <div class="col-xs-12">
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">Judge Numbers (<?php echo $judges; ?>)</h3>

               <div class="box-tools">
                 <div class="input-group input-group-sm" style="width: 150px;">
                   <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                   <div class="input-group-btn">
                     <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                   </div>
                 </div>
               </div>
             </div>
             <form method="post" action="home.php">
             <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                <tr>
                  <th>Candidate Name</th>
                  <th>Number</th>
                  <th>Representing</th>
                  <?php $crit = find_criteria_by_id($comp); ?>
                  <?php while($critname = mysqli_fetch_assoc($crit)){ ?>
                    <th><?php echo $critname['name']; ?></th>
                  <?php } ?>

                  <?php 
                  $cand = find_candidates_by_comp($comp); 
                  while($candidate = mysqli_fetch_assoc($cand)){
                  ?>
                  <tr>
                    <td><?php echo $candidate['fname']; ?></td>
                    <td><?php echo $candidate['candidate_number']; ?></td>
                    <td><?php echo $candidate['representing']; ?></td>

                    <?php 
                    $queryy = "SELECT criteria_id FROM criteria WHERE competition_id =".$comp;
                    $ress = mysqli_query($conn, $queryy);
                    ?>
                    <?php while($re = mysqli_fetch_assoc($ress)){ ?>
                    <?php $ya = $re['criteria_id']; ?>
                      <?php
                        $query = "SELECT SUM(score)/".$judges." as sum FROM score WHERE candidate_id =".$candidate['candidate_id']." and criteria_id =".$re['criteria_id'];
                        $res = mysqli_query($conn, $query);
                      ?>
                      <?php  
                        while($row = mysqli_fetch_assoc($res)){
                      ?>
                        <td><?php echo $row['sum']; ?></td>
                      <?php } ?>

                      <?php } ?>
                      <?php 
                      $query = "SELECT SUM(score) as total FROM score WHERE candidate_id =".$candidate['candidate_id'];
                      $resss = mysqli_query($conn, $query);
                      while($total = mysqli_fetch_assoc($resss)){ 
                      ?>
                      <td><?php echo $total['total']; ?></td>
                      <?php } ?>

                  </tr>

                  <?php } ?>

               </table>
            </div>
          </form>
        </div>
        </div>
        </div>
</div>

<?php include("../includes/judge_footer.php"); ?>