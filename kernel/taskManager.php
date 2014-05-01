<?php
	include("types/SimpleQuestionAnswerType.php");
	
	function GetTaskFromString($taskString)
	{
		list($fileName, $taskName, $optional) = explode("-.-", $taskString);
	
		$t = new SimpleQuestionAnswerType("was ist 2+2?", "4");
		return $t;
	}
?>