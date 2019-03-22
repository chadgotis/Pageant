
  <?php include("../includes/header.php"); ?>
  <?php include("../includes/functions.php"); ?>

  <?php include("../includes/navigation.php"); ?>


  <div class="content-wrapper">
    <section class="content-header">
      <!-- START HERE -->
      <h1>
        Home page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <section class="content">
<div class="row">
      <!-- Default box -->
      <div class="col-md-3">
      <div class="small-box bg-blue">
          <div class="inner">
            <?php  
              $query = "SELECT count(competition_id) as comp_count FROM competition";
              $res = mysqli_query($conn, $query);
              $comp_count = mysqli_fetch_assoc($res);
            ?>
            <h3><?php echo $comp_count['comp_count'];  ?></h3>

            <p>Competitions</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="competition.php" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
        </div>

        <div class="col-md-3">
        <div class="small-box bg-yellow">
            <div class="inner">
            <?php  
              $query = "SELECT count(candidate_id) as cand_count FROM candidate";
              $ress = mysqli_query($conn, $query);
              $candi_count = mysqli_fetch_assoc($ress);
            ?>
              <h3><?php echo $candi_count['cand_count']; ?></h3>

              <p>Total Candidates</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="candidate.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
          </div>

          <div class="col-md-3">
          <div class="small-box bg-green">
              <div class="inner">
              <?php  
                $query = "SELECT count(judge_id) as j_count FROM judge";
                $resss = mysqli_query($conn, $query);
                $j_count = mysqli_fetch_assoc($resss);
              ?>
                <h3><?php echo $j_count['j_count'] ;?></h3>

                <p>Total Judges</p>
              </div>
              <div class="icon">
                <i class="fa fa-eye"></i>
              </div>
              <a href="judges.php" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
            </div>

            <div class="col-md-3">
            <div class="small-box bg-red">
                <div class="inner">
                <?php  
                  $query = "SELECT count(tabulator_id) as t_count FROM tabulator";
                  $ressss = mysqli_query($conn, $query);
                  $t_count = mysqli_fetch_assoc($ressss);
                ?>
                  <h3><?php echo $t_count['t_count']; ?></h3>

                  <p>Total Tabulators</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="tabulator.php" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
              </div>
</div>
<div class="jumbotron">
  <p class="text-center">Welcome To Wesleyan Automated Pageant Scoring System!</p>
  <p class="text-center"><small>Use our System with these 3 easy steps!</small></p>

  <section id="plans">
      <div class="container">
          <div class="row">

              <!-- item -->
              <div class="col-md-4 col-sm-4 text-center">
                  <div class="panel panel-danger panel-pricing">
                      <div class="panel-heading">
                          <i class="fa fa-desktop"></i>
                          <h3>Step 1</h3>
                      </div>
                      <div class="panel-body text-center">
                          <p>Create a competition, and populate it's criteria for judging.</p>
                      </div>
                  </div>
              </div>
              <!-- /item -->

              <!-- item -->
              <div class="col-md-4 col-sm-4 text-center">
                  <div class="panel panel-warning panel-pricing">
                      <div class="panel-heading">
                          <i class="fa fa-desktop"></i>
                          <h3>Step 2</h3>
                      </div>
                      <div class="panel-body text-center">
                          <p>Create candidates for the competition</p>
                      </div>
                  </div>
              </div>
              <!-- /item -->

              <!-- item -->
              <div class="col-md-4 col-sm-4 text-center">
                  <div class="panel panel-success panel-pricing">
                      <div class="panel-heading">
                          <i class="fa fa-desktop"></i>
                          <h3>Step 3</h3>
                      </div>
                      <div class="panel-body text-center">
                          <p>Register tabulator and Judges for the competition</p>
                      </div>
                  </div>
              </div>
              <!-- /item -->

          </div>
      </div>
  </section>

</div>
      <!-- /.box -->



     <script type="text/javascript">
    //         function readURL(input) {
    //             if (input.files && input.files[0]) {
    //                 var reader = new FileReader();

    //                 reader.onload = function (e) {
    //                     $('#blah').attr('src', e.target.result);
    //                 }

    //                 reader.readAsDataURL(input.files[0]);
    //             }
    //         }
    //     </script>

   <!--      <form id="form1" runat="server">
            <input type='file' onchange="readURL(this);" />
            <img class="img-thumbnail" id="blah" src="Personal.png" alt="your image" height="200" width="200">
        </form> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include("../includes/footer.php"); ?>
