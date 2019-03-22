<?php
session_start();
include("../connection.php"); 
include("../includes/functions.php"); 

if(is_array($_POST['crit_id'])){
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