<html>
<head>
<script language="javascript">
var elems = document.getElementsByClassName('toAdd');

var myLength = elems.length,
total = 0;

for (var i = 0; i < myLength; ++i) {
  total += elems[i].value;
}

document.getElementById('total').value = total;
</script>
</head>
<body>
<input class="toAdd" />
<input class="toAdd" />
<input class="toAdd" />
<input class="toAdd" />
<span id="total"></span>
</body>
</html>