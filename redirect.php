<?php
	function GetTaskDescription()
	{
		$uri = $_SERVER['REQUEST_URI'];
		echo $uri;
		if($uri == "/plus") return "MentalMathTasks-.-GenerateMentalMathTask-.-1";
	}
?>