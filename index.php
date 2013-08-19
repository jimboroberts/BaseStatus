<?php

if(isset($_GET['mytdcount'])){ include('core/count.php'); } 
else if(isset($_GET['mytdopen'])){ include('core/opentodos.php'); }
else if(isset($_GET['tdproject'])){ include('core/opentodos.php'); }
else {
	//include_once('core/opentodos.php');
	//include_once('core/count.php');
	echo("No function selected");
}


?>





