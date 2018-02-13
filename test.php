<html>
<head>
<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>




</head>
<body>




<table id="example" class="display" cellspacing="0" width="100%">
<thead><tr><th>ID</th><th>Opportunity Name</th><th>Opportunity Status</th><th>Sales Rep</th></tr></thead>
<tbody><tr><td>1</td><td>Test</td><td>Closed</td><td>Fatso</td><td>Fatso</td><td>Hire Purchase</td><td>Laptops</td><td>2000</td><td>20</td><td>Test</td><td>fmupfuti@innovent.co.za</td><td>0774435779</td><td>facebook</td><td></tr></tbody>
<tfoot>Done</tfoot>
</table>
</body>
<script type="text/javascript">
$(window).load(function() {
	alert('test');
    $('#example').DataTable();
} );
</script>
</html>