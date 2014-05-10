<?php
	function GenerateNumberClassificationTask($data)
	{
		$random = mt_rand(1, 3);
		
		// natural numbers
		if($random == 1)
		{
			$t = new MultipleChoiceType(mt_rand(0, 100), array("natürliche Zahl", "ganze Zahl", "reelle Zahl"), 0);
		}
		
		// integers numbers
		if($random == 2)
		{
			$t = new MultipleChoiceType(mt_rand(-100, -1), array("natürliche Zahl", "ganze Zahl", "reelle Zahl"), 1);
		}
		
		// real numbers
		if($random == 3)
		{
			$t = new MultipleChoiceType(GenerateRealNumber(-100, 100, mt_rand(1, 4)), array("natürliche Zahl", "ganze Zahl", "reelle Zahl"), 2);
		}
		
		$t->taskDescription = "Bestimme den Zahlenbereich möglichst genau";
		return $t;
	}
?>