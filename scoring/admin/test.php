<!-- criteria -->
<div class="container">
<div class="row">
<div class="col-md-6">
  <div class="form-group">
<form name="add_name" id="add_name">
<table class="table table-bordered" id="dynamic_field">
    <tr>
      <td><input type="text" placeholder="Enter Name" name="name[]" id="name" class="form-control name_list"></td>
      <td><button type="button" class="btn btn-success" name="add" id="add">Add More</button></td>
    </tr>
</table>
<input type="button" name="submit" id="submit" value="Submit">
</form>
</div>
</div>
</div>
</div>

<!-- Criteria -->

<!-- criteria ajax -->
<script>
$(document).ready(function(){
  var i = 1;
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" placeholder="Enter Name" name="name[]" id="name" class="form-control name_list"></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
  });
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
    $('#row'+button_id+'').remove();
  });
  $('#submit').click(function(){
    $.ajax({
      url:"criteria.php",
      method:"POST",
      data:$('#add_name').serialize(),
      success:function(data){
        alert(data);
        $('#add_name')[0].reset();
      }
    });
  });
});
</script>

<!-- criteria ajax -->
<!-- criteria php -->
<?php
include("../connection.php");

$number = count($_POST['name']);

if($number > 1)
{
  for($i = 0; $i < $number; $i++)
  {
    if(trim($_POST['name'][$i]) != '')
    {
      $query = "INSERT INTO competition(name) VALUES ('".mysqli_real_escape_string($conn, $_POST['name'][$i])."')";
      mysqli_query($conn, $query);
    }
  }
  echo "Data Inserted";
}
else
{
  echo "Enter Name";
}
?>

<!-- criteria php -->
