<?php
	function GenerateMentalMathTask($data)
	{
		$numTaskTypes = 6;
		if($data == "" || $data < 1 || $data > $numTaskTypes) $random = rand(1, $numTaskTypes);
		else $random = $data;
		
		// add
		if($random == 1)
		{
			$z1 = rand(2, 100);
			$z2 = rand(2, 100);
			$t = new SimpleQuestionAnswerType($z1 ."+". $z2, $z1 + $z2);
		}
		
		// subtract
		if($random == 2)
		{
			$z1 = rand(2, 100);
			$z2 = rand(2, 100);
			$t = new SimpleQuestionAnswerType($z1 ."-". $z2, $z1 - $z2);
		}
		
		// multiply
		if($random == 3)
		{
			$type = rand(1, 3);
			// same size
			if($type <= 2)
			{
				$z1 = rand(2, 20);
				$z2 = rand(2, 20);
				$t = new SimpleQuestionAnswerType($z1 ."*". $z2, $z1 * $z2);
			}
			// big difference
			if($type == 3)
			{
				$z1 = rand(2, 10);
				$z2 = rand(50, 1000);
				$t = new SimpleQuestionAnswerType($z1 ."*". $z2, $z1 * $z2);
			}
		}
		
		// divide
		if($random == 4)
		{
			$z1 = rand(2, 50);
			$z2 = $z1 * rand(2, 15);
			$t = new SimpleQuestionAnswerType($z2 .":". $z1, $z2 / $z1);
		}

		// square root
		if($random == 5)
		{
			$z1 = rand(2, 20);
			$z2 = $z1 * $z1;
			$t = new SimpleQuestionAnswerType("\sqrt{". $z2 . "}", $z1);
		} 

        // square
        if ($random == 6)
        {
            $z = rand(1, 20);
            $t = new SimpleQuestionAnswerType($z ."^2", pow($z, 2));
        }
		
		$t->help = '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask">alle &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-1">Addition &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-2">Subtraktion &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-3">Multiplizieren &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-4">Dividieren &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-5">Wurzel ziehen &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-6">Quadrieren &uuml;ben</a></br>';
		$t->help .= '</br>';
		$t->help .= '</br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateFractionTask">Br&uuml;che &uuml;ben</a></br>';
		
		return $t;
	}
	
	function GenerateFractionTask($data)
	{
		$numTaskTypes = 5;
		if($data == "" || $data < 1 || $data > $numTaskTypes) $random = rand(1, $numTaskTypes);
		else $random = $data;
		
		// reduce
		if($random == 1)
		{
			GenerateFraction(15, $a, $b, true);
			$factor = rand(2, 15);	
		
			$t = new SimpleQuestionAnswerType("K&uuml;rzen: <div class='math'>\\frac{". $a * $factor."}{". $b * $factor ."}</div>", $a ."/". $b);
		}
		
		// add
		if($random == 2)
		{
			GenerateFraction(15, $a1, $b1, false);
			GenerateFraction(15, $a2, $b2, false);
			AddFractions($a1, $b1, $a2, $b2, $resA, $resB);
		
			$t = new SimpleQuestionAnswerType("<div class='math'>\\frac{". $a1 ."}{". $b1 ."}+\\frac{". $a2 ."}{". $b2 ."}</div>", $resA ."/". $resB);
		}
		
		// subtract
		if($random == 3)
		{
			GenerateFraction(15, $a1, $b1, false);
			GenerateFraction(15, $a2, $b2, false);
			SubtractFractions($a1, $b1, $a2, $b2, $resA, $resB);
		
			$t = new SimpleQuestionAnswerType("<div class='math'>\\frac{". $a1 ."}{". $b1 ."}-\\frac{". $a2 ."}{". $b2 ."}</div>", $resA ."/". $resB);
		}
		
		// multiply
		if($random == 4)
		{
			GenerateFraction(15, $a1, $b1, false);
			GenerateFraction(15, $a2, $b2, false);
			MultiplyFractions($a1, $b1, $a2, $b2, $resA, $resB);
		
			$t = new SimpleQuestionAnswerType("<div class='math'>\\frac{". $a1 ."}{". $b1 ."}*\\frac{". $a2 ."}{". $b2 ."}</div>", $resA ."/". $resB);
		}
		
		// divide
		if($random == 5)
		{
			GenerateFraction(15, $a1, $b1, false);
			GenerateFraction(15, $a2, $b2, false);
			DivideFractions($a1, $b1, $a2, $b2, $resA, $resB);
		
			$t = new SimpleQuestionAnswerType("<div class='math'>\\frac{". $a1 ."}{". $b1 ."}:\\frac{". $a2 ."}{". $b2 ."}</div>", $resA ."/". $resB);
		}
		
		$t->help = 'Beispiel: 3/4 ; 18/5';
		$t->help .= '</br>';
		$t->help .= '</br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateFractionTask">alles mit Br&uuml;chen &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateFractionTask-.-1">K&uuml;rzen &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateFractionTask-.-2">Addition &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateFractionTask-.-3">Subtraktion &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateFractionTask-.-4">Multiplikation &uuml;ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateFractionTask-.-5">Division &uuml;ben</a></br>';
		$t->help .= '</br>';
		$t->help .= '</br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask">andere Kopfrechenaufgaben &uuml;ben</a></br>';
		$t->jsMathUse = false;
		
		if($random != 1) if($resB == 1) $t->answer = $resA;
		
		return $t;
	}
?>
