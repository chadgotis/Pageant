<?php 
include("connection.php");
include("../includes/functions.php");

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);

 $result=mysqli_query($conn, "SELECT judge.*,competition.name FROM judge INNER JOIN competition WHERE username = '$username' AND password = '$password' AND judge.availability = 0 AND competition.competition_id = judge.competition_id");
 $row=mysqli_fetch_array($result);
//type.type_id = account.type_id
 if($row['availability'] == 0){
    if($row>0){
        if($row['logged_in'] == FALSE){
            $jid = $row['judge_id'];
            $query = "UPDATE judge SET logged_in = 1 where judge_id =".$jid;
            $res = mysqli_query($conn, $query);

            session_start();
                $_SESSION['judge_id']=$row['judge_id'];
                $_SESSION['user']=$row['username'];
                $_SESSION['pass']=$row['password'];
                $_SESSION['competition_id']=$row['competition_id'];
                $_SESSION['competition_name']=$row['name'];
                $_SESSION['first']=$row['fname'];
                 $_SESSION['last']=$row['lname'];
                 $_SESSION['logged_in']= TRUE;
                 $query = "SELECT COUNT(name) as crit_count FROM criteria WHERE competition_id =".$row['competition_id'];
                 $res = mysqli_query($conn,$query);
                 $count = mysqli_fetch_assoc($res);
                $_SESSION['count'] = $count['crit_count'];
                mysqli_free_result($res);
            header("Location:judge/home.php");
        }else{
            echo "<script>";
            echo "window.alert(\"User Already Logged_in!\")";
            echo "</script>";

            echo "<script>";
            echo "window.location.href = (\"index.php\")";
            echo "</script>";
        }
   
    }else{
    header("Location:index.php");
    }
}else{
    header("Location:judge/thank.php");
}

?>