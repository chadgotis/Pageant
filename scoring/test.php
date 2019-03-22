<?php session_start(); ?>
<?php include("connection.php"); ?>
<?php include("includes/functions.php"); ?>
<?php include("includes/judge_header.php"); ?>

<?php 
//crit count
$count = $_SESSION['count'];
?>
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
             <form method="post" action="home.php">
             <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
               <tr>
                 <th>ta</th>
               </tr>


               </table>
             </div>
             <input type="submit" value="submit" name="submit" class="btn btn-success">
            </form>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
         </div>
       </div>
  <!-- /.content -->
</div>

<?php include("../includes/judge_footer.php"); ?>