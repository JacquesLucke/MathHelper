<?php
	include("helper.php");
	include("types/SimpleQuestionAnswerType.php");
	
	function GetTaskFromString($taskString)
	{
		list($path, $taskName, $optional) = explode("-.-", $taskString);
		$path = "tasks/". $path .".php";
		$e = (string)include($path);
		if($e == "1" && function_exists($taskName)) return $taskName($optional);
		else return new ErrorType;
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