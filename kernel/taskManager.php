<?php
	include("TaskTypes/SimpleQuestionAnswerType.php");
	
	function GetTaskFromString($taskString)
	{
		$t = new SimpleQuestionAnswerType("was ist 2+2?", "4");
		return $t;
	}

	class TaskType
	{
		function SetTaskTitle()
		{
			echo "<title>task</title>";
		}

		function AddTaskStyle()
		{
		}
		
		function AddTask()
		{
		}
		
		function AddTaskHelp()
		{
		}
	}
?>