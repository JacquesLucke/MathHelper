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
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateFractionTask">Br&uuml;che &uuml;ben</a></br>';
		
		return $t;
	}
	
	function GenerateFractionTask($data)
	{
		do
		{
			$z1 = rand(1, 15);
			$z2 = rand(1, 15);
			$z3 = rand(2, 15);		
			ReduceFraction($z1, $z2);
		} 
		while ($z2 == 1);
	
		$t = new SimpleQuestionAnswerType("K&uuml;rzen: <div class='math'>\\frac{". $z1 * $z3 ."}{". $z2 * $z3 ."}=</div>", $z1 ."/". $z2);
		$t->jsMathUse = false;
		
		$t->help = 'Beispiel: 3/4 ; 18/5';
		$t->help .= '</br>';
		$t->help .= '</br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask">andere Kopfrechenaufgaben &uuml;ben</a></br>';
		return $t;
	}
?>
