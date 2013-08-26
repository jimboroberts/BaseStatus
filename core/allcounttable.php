<?php
//header('Content-type: application/json');
require_once('core/BasecampAPI.php');
require_once('config/settings.php');

$bc = new Basecamp("$basecampAccountID", "$basecampUsername", "$basecampPassword", "$appName", "$appContact");

$people = $bc->getProjectAccess($basecampProject);
$totalpeople = count($people);

echo '<table id="Staff">';

foreach ($people as $person):
	
	$personname = $person->name; 
	$personid = $person->id;
	$personimage = $person->avatar_url;
	$personurl = $person->url;

	$todos = $bc->getAssignedToDos($personid);
	$todocount = 0;
	
	foreach ($todos as $todo):	
		if($todo->bucket->id == $basecampProject){
			
			$listcount = $todo->assigned_todos; 	
			$todocount = $todocount + count($listcount);
		}
	endforeach;
	
	echo '<tr>';
	echo '<td class="Image" style="width: 30px;"><img src="'.$personimage.'" /></td>';
  echo '<td class="Name">'.$personname.'</td>';
  echo '<td class="AssignedToDos">'.$todocount.'</td>';
	echo '</tr>';
endforeach;


echo '</table>';

?>