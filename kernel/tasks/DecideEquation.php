<?php
	function GenerateDecideEquationTask($data)
	{
		$random = rand(1, 3);
		
		// linear
		if($random == 1)
		{	
			$a = RandSpecial(-10, 10, false);
			$b = AddSignToString(RandSpecial(-10, 10, false));
			$c = RandSpecial(-10, 10, false);
			
			$type = rand(1, 3);
			if($type == 1) $question = $a ."x". $b ."=". $c;
			if($type == 2) $question = $a ."x". $b ."=". $c ."x";
			if($type == 3) $question = $a . $b ."x=". $c;
			
			$t = new MultipleChoiceType($question, array("lineare Gleichung", "quadratische Gleichung", "biquadratische Gleichung", "sonstiges"), 0);
		}
		
		// quadratic
		if($random == 2)
		{		
			$a = RandSpecial(-10, 10, false);
			$b = AddSignToString(RandSpecial(-10, 10, false));
			$c = AddSignToString(RandSpecial(-10, 10, false));
			$d = RandSpecial(-3, 3, false);
			
			$type = rand(1, 4);
			if($type == 1) $question = $a ."x^2". $b ."x". $c ."=". $d;
			if($type == 2) $question = $a ."x". $b ."x^2". $c ."=". $d;
			if($type == 3) $question = $a . $b ."x^2". $c ."x=". $d ."x";
			if($type == 4) $question = $a . $b ."x". $c ."x^2=". $d ."x^2";
			
			$t = new MultipleChoiceType($question, array("lineare Gleichung", "quadratische Gleichung", "biquadratische Gleichung", "sonstiges"), 1);
		}
		
		// biquadratic
		if($random == 3)
		{		
			$a = RandSpecial(-10, 10, false);
			$b = AddSignToString(RandSpecial(-10, 10, false));
			$c = AddSignToString(RandSpecial(-10, 10, false));
			$d = RandSpecial(-3, 3, false);
			
			$type = rand(1, 4);
			if($type == 1) $question = $a ."x^4". $b ."x^2". $c ."=". $d;
			if($type == 2) $question = $a ."x^2". $b ."x^4". $c ."=". $d;
			if($type == 3) $question = $a . $b ."x^4". $c ."x^2=". $d ."x^2";
			if($type == 4) $question = $a . $b ."x^2". $c ."x^4=". $d ."x^4";
			
			$t = new MultipleChoiceType($question, array("lineare Gleichung", "quadratische Gleichung", "biquadratische Gleichung", "sonstiges"), 2);
		}
		
		$t->links = "<a href='grundaufgaben'>alle üben</a></br>";
		$t->links .= "<a href='brueche'>Brüche üben</a></br>";
		
		$t->help = "Um diese Aufgabe zu lösen, muss man sich die vorhandenen Exponenten an der Variable anschauen.<br/>";
		$t->help .= "<br/>";
		$t->help .= "<ul type='circle'>";
		$t->help .= "<li>keine Exponent oder 1: lineare Gleichung</li>";
		$t->help .= "<li>2 höchster Exponent: quadratische Gleichung</li>";
		$t->help .= "<li>4 als höchsten Exponent und optional noch 2: biquadratische Gleichung</li>";
		$t->help .= "<li>alles andere sind sonstige Gleichungen die sich zum Beispiel 5ten-Grades nennen (je nach dem höchsten Exponenten).</li>";
		$t->help .= "</ul>";
		
		return $t;
	}
?>