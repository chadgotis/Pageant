function confirmDelete(){
  var qwe = confirm("Are you sure to delete?");
  if(qwe){
    alert("Removed Successfully!")
  }else{
    return false;
  }
}
function printPage(){
    window.print();
}