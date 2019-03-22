<?php
include("../connection.php");
include("../includes/functions.php");

$number = count($_POST['name']);

if($number > 1)
{
  for($i = 0; $i < $number; $i++)
  {
    if(!empty(trim($_POST['name'][$i])))
    {
      $name = $_POST['name'][$i];
      $max = $_POST['max'][$i];
      $comp_id = $_GET['competition_id'];

      $query = "INSERT INTO criteria(competition_id,name, max_value) VALUES ('{$comp_id}','{$name}','{$max}')";
      $result = mysqli_query($conn, $query);
			confirm_query($result);
    }
  }
  echo "Data Inserted";
}
else
{
  echo "Enter Name";
}
?>
