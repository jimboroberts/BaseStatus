<?php
//header('Content-type: application/json');
require_once('../config/settings.php');
require_once('BasecampAPI.php');

$bc = new Basecamp("$basecampAccountID", "$basecampUsername", "$basecampPassword", "$appName", "$appContact");

//$projects = $bc->getProjectTodos($basecampMe, $basecampProject);
$projects = $bc->getTodos($basecampMe);


$output = '';

//print_r($projects);

foreach ($projects as $project):
			
  //if($todos[due_on][0] != ""){

  	$output .= '<div class="todo">';
  		//echo '<img class="avatar" height="30" width="30" src="'.$project->creator->avatar_url.'" alt="avatar">';
  		
  		if(@$projectname != $project->bucket->name){
  			$output .= '<h2>'.$project->bucket->name.'</h2>';
  		}
  		
  		$output .= '<h3>'.$project->name.'</h3>';
  		
  		$projectname = $project->bucket->name;
  		
  		//Loop projects to-dos
  		$output .= '<ul>';
  			$todos = $project->assigned_todos;
  			foreach ($todos as $todo): 
  		 	 //$output .= '<li><a href="'.$todo->url.'">'.$todo->content.'</a>';
  		 	 $output .= '<li>'.$todo->content;
  		 	 $output .= '<span class="info">';
  		 	 $output .= '<img class="avatar" height="20" width="20" src="'.$project->creator->avatar_url.'" alt="avatar">';
  		 	 $output .= $todo->assignee->name;
  		 	 if(!empty($todo->due_on)) {
  		 	 	$output .=  ' - '.$todo->due_on;
  		 	 }
  		 	 $output .= '</span>';
  		 	 $output .= '</li>';
  		 	endforeach;
  		$output .= '</ul>';
  		
  	$output .= '</div>';
  //}
endforeach;

echo $output;

?>