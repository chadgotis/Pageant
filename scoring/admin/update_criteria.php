    <?php 
    include("../connection.php"); 
    include("../includes/functions.php");
      $name = $_POST['name'];
      $value = $_POST['value'];
      $comp = $_GET['competition_id'];

      $name = mysqli_real_escape_string($conn,$name);
      $value = mysqli_real_escape_string($conn,$value);

      $query = "UPDATE criteria SET name ='{$name}', max_value = '{$value}' WHERE criteria_id =".$_GET['criteria_id'];
      $ress = mysqli_query($conn, $query);

      header_to("competition.php");

    ?>