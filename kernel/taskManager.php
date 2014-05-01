<?php
	include("TaskTypes/SimpleQuestionAnswerType.php");
	
	function GetTaskFromString($taskString)
	{
		list($fileName, $taskName, $optional) = explode("-.-", $taskString);
		echo "$fileName---$taskName---$optional";
	
		$t = new SimpleQuestionAnswerType("was ist 2+2?", "4");
		return $t;
	}
?>