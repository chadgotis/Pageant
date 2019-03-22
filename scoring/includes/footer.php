<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>BSCS-4</b>
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">WU-P</a>.</strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../includes/script.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../bower_components/moment/moment.js"></script>
<script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="../bower_components/light/js/lightbox.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

</body>
</html>

<script>
$(document).ready(function(){
  var i = 1;
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" placeholder="Enter Name" name="name[]" id="name" class="form-control name_list"><td><input type="number" placeholder="Enter Total Percentage" name="max[]" id="max" class="form-control name_list"></td>  <td><input type="hidden" name="competition_id[]" id="competition_id" class="form-control name_list" value="<?php echo $_GET['competition_id']; ?>"></td></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
  });
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
    $('#row'+button_id+'').remove();
  });
  $('#submit').click(function(){
    $.ajax({
      url:"criteria.php?competition_id=<?php echo $_GET['competition_id']; ?>",
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
<?php mysqli_close($conn); ?>
