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
		
		$t->links = "<a href='grundaufgaben'>Grundaufgaben üben</a></br>";
		$t->links .= "<a href='brueche'>Brüche üben</a></br>";
		$t->links .= "<a href='gleichungstyp'>Gleichungstyp bestimmen</a></br>";
		
		$t->help = "Man unterteilt die Zahlen in verschiedene Bereiche. Hier sind einige aufgelistet:<br/>";
		$t->help .= "<br/>";
		$t->help .= "<ul type='circle'>";
		$t->help .= "<li><b>natürliche Zahlen:</b> positive ganze Zahlen (manchmal mit der Null); z.b. 1, 5, 23, 30</li>";
		$t->help .= "<li><b>ganze Zahlen:</b> alle Zahlen ohne Nachkommastellen; z.b. -20, -5, 0, 3, 10</li>";
		$t->help .= "<li><b>reelle Zahlen:</b> alle Zahlen die sich durch einen Bruch darstellen lassen; z.b. 0,1 = ein zehntel</li>";
		$t->help .= "</ul>";
		
		return $t;
	}
?>