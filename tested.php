<?php

include(dbconn.php);
?>

<!DOCTYPE html>
<head>
</head>
<body>
Name:<input type="text" id="name" name="name">
	<input type="submit" id="name-submit" value="Go">
	<div id="name-data"></div>

</body>

<script type="text/javascript" src="js/jquery-1.12.4.js"></script>

<script type="text/javascript">
$('input#name-submit').on('click',function(){
	alert(1);
	var name=$('input#name').val();
	alert(name);
	
	$.post('ajax/name.php',{name:name},function(data))
	
	{
		alert(data);
	});
});

</script>
</html>

