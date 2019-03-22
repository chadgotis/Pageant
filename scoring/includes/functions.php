<?php
function header_to($link){
	header("Location:".$link);
}
function generate_password($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generate_judge_username($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = 'WUPJUDGE-';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generate_tab_username($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = 'WUPTAB-';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function confirm_query($result_set){
	if(!$result_set){
		die("Error! Abort!");
	}
}
function alert_message($message){
		$gg = $message;
		echo "<script>alert(\"".$gg."\");</script>";
}

function find_account($tid){
	global $conn;
	$query = "SELECT account.* , type.* from account inner join type on account.type_id = type.type_id AND account.type_id =" . $tid;
	$res = mysqli_query($conn, $query);
	confirm_query($res);
	return $res;
}

function find_account_id($aid,$tid){
	global $conn;
	$query = "SELECT * FROM account WHERE account_id =".$aid." AND type_id=".$tid ;
	$res = mysqli_query($conn, $query);
	confirm_query($res);
	return $res;

}

function free_result($res){
	mysqli_free_result($res);
}

function find_competition(){
	global $conn;

	$query = "SELECT * FROM competition";
	$res = mysqli_query($conn, $query);

	confirm_query($res);
	return $res;
}
function find_competition_by_id_and_status($id){
	global $conn;

	$query = "SELECT * FROM competition WHERE competition_id =".$id." AND status =".'1';
	$res = mysqli_query($conn, $query);

	confirm_query($res);
	return $res;
}
function find_competition_by_id($id){
	global $conn;

	$query = "SELECT * FROM competition WHERE competition_id =".$id;
	$res = mysqli_query($conn, $query);

	confirm_query($res);
	return $res;
}
function find_competition_by_status($status){
	global $conn;

	$query = "SELECT * FROM competition WHERE status =".$status;
	$res = mysqli_query($conn, $query);

	confirm_query($res);
	return $res;
}

function add_competition($a,$b,$c){
	global $conn;

	$a = mysqli_real_escape_string($conn, $a);
	$b = mysqli_real_escape_string($conn, $b);
	$c = mysqli_real_escape_string($conn, $c);


	$query = "INSERT INTO competition (name, description, status) VALUES ('{$a}','{$b}','{$c}')";
	$res = mysqli_query($conn, $query);
	confirm_query($res);
	return $res;

}
function update_competition($a,$b,$c,$d){
	global $conn;

	$a = mysqli_real_escape_string($conn, $a);
	$b = mysqli_real_escape_string($conn, $b);
	$c = mysqli_real_escape_string($conn, $c);

	$query = "UPDATE competition SET  
								name ='{$a}',
								description ='{$b}',
								status ='{$c}' WHERE competition_id = ".$d;
	$res = mysqli_query($conn, $query);
	return $res;

}
function add_judge($comp,$fname,$lname, $user, $password){
global $conn;

if($comp == 0){
	echo 
	"<script>alert(\"Please Pick a Competition to judge!\");</script>";
}else{
  $comp = mysqli_real_escape_string($conn,$comp);
  $fname = mysqli_real_escape_string($conn,$fname);
  $lname = mysqli_real_escape_string($conn,$lname);
  $user = mysqli_real_escape_string($conn,$user);
  $password = mysqli_real_escape_string($conn,$password);

$query = "INSERT INTO judge (competition_id, fname, lname, username, password) VALUES ('{$comp}','{$fname}','{$lname}','{$user}','{$password}')";
$res = mysqli_query($conn, $query);
return $res;
}
}
function find_judge(){
	global $conn;

	$query = "SELECT competition.name, judge.* FROM judge INNER JOIN competition WHERE competition.competition_id = judge.competition_id";
	$res = mysqli_query($conn, $query);
	confirm_query($res);
	return $res;
}
function find_judge_by_id($judge){
	global $conn;

	$query = "SELECT competition.name, judge.* FROM judge INNER JOIN competition WHERE competition.competition_id = judge.competition_id AND judge_id =".$judge;
	$res = mysqli_query($conn, $query);
	confirm_query($res);
	return $res;
}
function update_judge($comp,$fname,$lname,$user,$password,$judge){
	$comp = mysqli_real_escape_string($conn,$comp);
	$fname = mysqli_real_escape_string($conn,$fname);
	$lname = mysqli_real_escape_string($conn,$lname);
	$user = mysqli_real_escape_string($conn,$user);
	$password = mysqli_real_escape_string($conn,$password);

	$query = "UPDATE judge SET  
								competition_id ='{$comp}',
								fname ='{$fname}',
								lname ='{$lname}',
								username ='{$user}',
								password ='{$password}' WHERE judge_id = ".$judge;
	$res = mysqli_query($conn, $query);
	return $res;
}
function find_candidates(){
	global $conn;

	$query = "SELECT competition.competition_id, competition.name, candidate.* FROM candidate INNER JOIN competition WHERE competition.competition_id = candidate.competition_id";
	$res = mysqli_query($conn,$query);

	return $res;
}
function find_candidates_by_id($id){
	global $conn;

	$query = "SELECT * FROM candidate WHERE candidate_id =".$id;
	$res = mysqli_query($conn,$query);

	return $res;
}
function find_candidates_by_comp($id){
	global $conn;

	$query = "SELECT * FROM candidate WHERE competition_id =".$id." ORDER BY candidate_number ASC";
	$res = mysqli_query($conn,$query);

	return $res;
}
function find_criteria_by_id($id){
	global $conn;

	$query = "SELECT * FROM criteria WHERE competition_id = ".$id;
	$res = mysqli_query($conn, $query);

	return $res;
}
function find_criteria_name_by_id($comp_id){
	global $conn;

	$query = "SELECT name FROM criteria WHERE competition_id =".$comp_id; 
	$res = mysqli_query($conn, $query);

	return $res;
}
function find_criteria_id($comp_id){
	global $conn;

	$query = "SELECT criteria_id FROM criteria WHERE competition_id =".$comp_id; 
	$res = mysqli_query($conn, $query);

	return $res;
}
function find_judge_name($username, $password){
	global $conn;

	$query = "SELECT * FROM judge WHERE username = '$username' AND password = '$password'"; 
	$res = mysqli_query($conn, $query);

	return $res;
}
function count_judge_by_comp($comp){
	global $conn;

	$query = "SELECT COUNT(judge_id) as jcount FROM judge WHERE competition_id =".$comp; 
	$res = mysqli_query($conn, $query);

	return $res;
}
function join_cand_score($comp){
	global $conn;

	$query = "SELECT candidate.*, score.score as sum FROM candidate INNER JOIN score on candidate.candidate_id = score.candidate_id WHERE candidate.competition_id =".$comp; 
	$res = mysqli_query($conn, $query);

	return $res;
}
function find_tab(){
	global $conn;

	$query = "SELECT * FROM tabulator";
	$res = mysqli_query($conn, $query);

	return $res;
}
function find_tab_by_id($id){
	global $conn;

	$query = "SELECT * FROM tabulator where tabulator_id =".$id;
	$res = mysqli_query($conn, $query);

	return $res;
}
?>
