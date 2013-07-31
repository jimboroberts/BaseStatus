<?php
require('core/BasecampAPI.php');
require('config/settings.php');


if($_GET['fc'] == 'mytdcount'){ include_once('core/count.php'); } 
else if($_GET['fc'] == 'myopentd'){ include_once('core/opentodos.php'); }
else {
	echo 'Error choosing function';
}


?>





