<?php
	function GetTaskDescription()
	{
		if(isset($_GET["task"])) return $_GET["task"];
		$uri = strtolower($_SERVER['REQUEST_URI']);
		$uri = substr($uri, 1);
		
		// get task description from url -> pretty URLs		
		switch($uri)
		{
			case "grundaufgaben": 	return "MentalMathTasks-.-GenerateMentalMathTask";
			case "addieren": 		return "MentalMathTasks-.-GenerateMentalMathTask-.-1";
			case "subtrahieren": 	return "MentalMathTasks-.-GenerateMentalMathTask-.-2";
			case "multiplizieren":	return "MentalMathTasks-.-GenerateMentalMathTask-.-3";
			case "dividieren": 		return "MentalMathTasks-.-GenerateMentalMathTask-.-4";
			case "wurzel": 			return "MentalMathTasks-.-GenerateMentalMathTask-.-5";
			case "quadrieren": 		return "MentalMathTasks-.-GenerateMentalMathTask-.-6";
		}
		return "";
	}
?>