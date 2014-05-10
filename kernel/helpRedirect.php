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
			
			case "brueche":					return "MentalMathTasks-.-GenerateFractionTask";
			case "brueche_kuerzen":			return "MentalMathTasks-.-GenerateFractionTask-.-1";
			case "brueche_addieren":		return "MentalMathTasks-.-GenerateFractionTask-.-2";
			case "brueche_subtrahieren":	return "MentalMathTasks-.-GenerateFractionTask-.-3";
			case "brueche_multiplizieren":	return "MentalMathTasks-.-GenerateFractionTask-.-4";
			case "brueche_dividieren":		return "MentalMathTasks-.-GenerateFractionTask-.-5";
			case "brueche_wurzel":			return "MentalMathTasks-.-GenerateFractionTask-.-6";
			case "brueche_potenzieren":		return "MentalMathTasks-.-GenerateFractionTask-.-7";
			
			case "kehrwert":	return "MentalMathTasks-.-GenerateReciprocalTask";
			
			case "gleichungstyp":	return "DecideEquation-.-GenerateDecideEquationTask";
			case "zahlenbereiche": 	return "NumberClassification-.-GenerateNumberClassificationTask";
		}
		return "";
	}
?>