<?php include("../connection.php"); ?>
<?php include("../includes/functions.php"); ?>

<?php 
session_start();

if(!$_SESSION['logged_in']){
 header("Location:index.php");
}
?>
<?php include("../connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WAPSS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../bower_components/light/css/lightbox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <script src="jquery.js"></script>

</head>
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>WAPPS</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button --><br>
              <a href="logout.php" class="btn btn-success">Logout</a>
            
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>


<div class="content-wrapper">
<?php 
      $comp = $_SESSION['competition_id'];
      $jc = count_judge_by_comp($comp); 
      $jcount = mysqli_fetch_assoc($jc);

      $judges = $jcount['jcount']; 
?>
  <div class="row">
         <div class="col-xs-12">
           <div class="box">
             <div class="box-header">
               <h3 class="box-title"><?php echo ucfirst($_SESSION['competition_name']); ?></h3>

              
             </div>
             <form method="post" action="home.php">
             <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                <tr>
                  <th>Number</th>
                  <th>Candidate Name</th>
                  <?php  
                    $query = "SELECT * FROM judge WHERE competition_id =".$_SESSION['competition_id'];
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
      <!--   <div class="row">
               <div class="col-xs-12">
                 <div class="box">
                   <div class="box-header">
                     <h3 class="box-title">Candidate Ranking</h3>                    
                   </div>
                   <div class="box-body table-responsive no-padding">
                     <table class="table table-hover">
                      <tr>
                        <th>Rank</th>
                        <th>Total Average</th>
                        <th>Name</th>
                        <th>Representing</th>
                      </tr>
                        <?php 
                          $query = "SELECT SUM(score)/3 as rankval, candidate.* FROM candidate INNER JOIN score on candidate.candidate_id = score.candidate_id ORDER BY rankval DESC";
                          $yo = mysqli_query($conn, $query);
                          while($yow = mysqli_fetch_assoc($yo)){
                        ?>
                      <tr>
                        <td>#<?php echo $yow['candidate_id']; ?></td>
                        
                          <?php 
                            $query = "SELECT SUM(score)/".$judges." as total FROM score WHERE candidate_id =".$yow['candidate_id'];
                            $red = mysqli_query($conn, $query);
                            while($tota = mysqli_fetch_assoc($red)){
                          ?>
                          <td><?php echo ROUND($tota['total'], 2); ?>%</td>
                          <?php } ?>

                        <td><?php echo $yow['fname']." ".$yow['lname']; ?></td>
                        <td><?php echo $yow['representing']; ?></td>
                      </tr>
                        <?php } ?>
                     </table>
                   </div>
                  </div>
                </div>
        </div>
 -->
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>BSCS-4</b>
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">WU-P</a>.</strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- Bootstrap 3.3.7 -->

</body>
<script type="text/javascript">
  function printPage(){
    window.print();
  }
</script>
</html>