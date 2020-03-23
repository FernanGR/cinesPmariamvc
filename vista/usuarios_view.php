<!DOCTYPE html>
<html>
 <head>
	 <meta charset="utf-8">
   <title> Cines PMaria </title>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 </head>
<body>


<?php
	foreach($users as $reg){
		echo $reg["usuario"];
    echo "<br>";
	}

 ?>


</body>
</html>
