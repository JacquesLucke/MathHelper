<?php
	include("helper.php");
	include("types/SimpleQuestionAnswerType.php");
	
	function GetTaskFromString($taskString)
	{
		// extract path and name from string
		list($path, $taskName, $optional) = explode("-.-", $taskString);
		$path = "tasks/". $path .".php";
		
		// execute the function, result should be a task
		$e = (string)include($path);
		if($e == "1" && function_exists($taskName)) $task = $taskName($optional);	
		
		//if there is no task coming back, an error task is created tp prevent later errors
		if(!method_exists($task, "AddTask")) $task = new ErrorType();
		
		return $task;
	}
	
	class ErrorType
	{
		public function SetTaskTitle()
		{
			echo "<title>Url ungültig</title>";
		}

		public function AddTaskStyle()
		{
		}
		
		public function AddTask()
		{
			echo "ungültige Url";
		}
		
		public function AddTaskHelp()
		{
		}
	}
?>