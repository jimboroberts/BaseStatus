<?php
header('Content-type: application/json');
require_once('BasecampAPI.php');
require_once('../config/settings.php');

$bc = new Basecamp("$basecampAccountID", "$basecampUsername", "$basecampPassword", "$appName", "$appContact");
$todos = $bc->getAssignedToDos($basecampMe);
$project = '';
$todocount = 0;
$i = 1;
$totalrows = count($todos);


foreach ($todos as $todo):
	
	if($i==1){ $project = $todo->bucket->name; }
	
	if($project!=$todo->bucket->name){
		$data[] = array('title' => $project, 'datapoints' => array( array('title' => "Outstanding ToDo's", "value" => $todocount)));
		$project = $todo->bucket->name;
		$todocount = 0;
	}
	
	$listcount = $todo->assigned_todos; 	
	$todocount = $todocount + count($listcount);
	
	if($totalrows==$i){
		$data[] = array('title' => $project, 'datapoints' => array( array('title' => "Outstanding ToDo's", "value" => $todocount)));	
	}
	
	//echo count($listcount).' - '.$todocount.' - '.$project."\n"; //Test output

	$i++; 
endforeach;

$arr = array('graph' => array(
	"title" => "Your open ToDo's",
	"total" => true,
	"refreshEveryNSeconds" => 120,
	"datasequences" => $data
));

echo json_encode($arr);

?>