<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	function GenerateMentalMathTask($data)
	{
		if($data == "") $random = rand(1, 6);
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
            $t = new SimpleQuestionAnswerType($z."^"."2", pow($z, 2));
        }
		
		$t->help = '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask">alle üben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-1">Addition üben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-2">Subtraktion üben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-3">Multiplizieren üben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-4">Dividieren üben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-5">Wurzel ziehen üben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-6"Quadrieren üben</a></br>';
		
		return $t;
	}
?>
