  <style>

.container.gallery-container {
    background-color: #fff;
    color: #35373a;
    min-height: 100vh;
    padding: 30px 50px;
}

.gallery-container h1 {
    text-align: center;
    margin-top: 50px;
    font-family: 'Droid Sans', sans-serif;
    font-weight: bold;
}

.gallery-container p.page-description {
    text-align: center;
    margin: 25px auto;
    font-size: 18px;
    color: #999;
}

.tz-gallery {
    padding: 40px;
}

/* Override bootstrap column paddings */
.tz-gallery .row > div {
    padding: 2px;
}

.tz-gallery .lightbox img {
    width: 100%;
    border-radius: 0;
    position: relative;
}

.tz-gallery .lightbox:before {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -13px;
    margin-left: -13px;
    opacity: 0;
    color: #fff;
    font-size: 26px;
    font-family: 'Glyphicons Halflings';
    content: '\e003';
    pointer-events: none;
    z-index: 9000;
    transition: 0.4s;
}


.tz-gallery .lightbox:after {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    background-color: rgba(46, 132, 206, 0.7);
    content: '';
    transition: 0.4s;
}

.tz-gallery .lightbox:hover:after,
.tz-gallery .lightbox:hover:before {
    opacity: 1;
}

.baguetteBox-button {
    background-color: transparent !important;
}

@media(max-width: 768px) {
    body {
        padding: 0;
    }
}
    </style>
  <?php include("../includes/header.php"); ?>
  <?php include("../includes/navigation.php"); ?>

  <?php 
  $results_per_page = 12;

  $sql = "SELECT * FROM candidate";
  $pres = mysqli_query($conn, $sql);
  $number_of_results = mysqli_num_rows($pres);
  ?>

  <?php 
  $number_of_pages = ceil($number_of_results/$results_per_page);

  if(!isset($_GET['page'])){
    $page = 1;
  }else{
    $page = $_GET['page'];
  }

  $this_page_first_result = ($page-1)*$results_per_page;


  $query = "SELECT * FROM candidate LIMIT $this_page_first_result , $results_per_page";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Error";
  }
  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <!-- START HERE -->
      <h1>
        Photo Gallery
        <small>Photos of all Existing Candidates</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>


<?php 
$query = "SELECT * FROM candidate";
$res = mysqli_query($conn, $query);
?>
    <!-- Main content -->
      <div class="container gallery-container">

          <h1>Photo Gallery</h1>

          <p class="page-description text-center">Fluid Layout With Overlay Effect</p>
          
          <div class="tz-gallery">

              <div class="row">

              <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="col-md-3">
                  <a href="<?php echo "../admin/uploads/".$row['image']; ?>" data-lightbox="image-1"  data-title="<?php echo "Candidate".": ".$row['fname'].' '.$row['lname']; ?>"> <img src="<?php echo "../admin/uploads/".$row['image']; ?>" class="img" width="250px" height="250px"></a>
                </div>
              <?php } ?>

              </div>
              <br>
              <center>
              <?php
              for($page = 1; $page <= $number_of_pages; $page++){ ?>
                <div class="btn-group">
                <a class="btn btn-primary btn-flat" href="gallery.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                </div>
                
              <?php
              }
              ?>
              </center>
          </div>

      </div>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <?php include("../includes/footer.php"); ?>
  
