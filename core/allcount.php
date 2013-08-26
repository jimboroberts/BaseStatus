<?php
header('Content-type: application/json');
require_once('core/BasecampAPI.php');
require_once('config/settings.php');

$bc = new Basecamp("$basecampAccountID", "$basecampUsername", "$basecampPassword", "$appName", "$appContact");

$people = $bc->getProjectAccess($basecampProject);

$totalpeople = count($people);

//print_r($people);

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
	
	$data[] = array('title' => $personname, 'datapoints' => array( array('title' => "Outstanding ToDo's", "value" => $todocount)));
	
endforeach;


$arr = array('graph' => array(
	"title" => "Assigned ToDo's",
	"total" => true,
	"refreshEveryNSeconds" => 120,
	"datasequences" => $data
));


echo json_encode($arr);

?>