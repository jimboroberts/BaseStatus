<?php

if(isset($_GET['mytdcount'])){ include('core/count.php'); } 
else if(isset($_GET['mytdopen'])){ include('core/opentodos.php'); }
else if(isset($_GET['tdproject'])){ include('core/opentodos.php'); }
else if(isset($_GET['alltdcount'])){ include('core/allcount.php'); }
else if(isset($_GET['alltdcounttb'])){ include('core/allcounttable.php'); }
else {
	//include_once('core/opentodos.php');
	//include_once('core/count.php');
	echo("No function selected, for help view <a href='https://github.com/jimboroberts/BaseStatus'>BaseStatus</a>");
}


?>





