<?php
	function GenerateMentalMathTask($data)
	{
		if($data == "") $random = rand(1, 5);
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
		
		$t->help = '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-1">nur Addition �ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-2">nur Subtraktion �ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-3">nur Multiplizieren �ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-4">nur Dividieren �ben</a></br>';
		$t->help .= '<a href="?task=MentalMathTasks-.-GenerateMentalMathTask-.-5">nur Wurzel ziehen �ben</a></br>';
		
		return $t;
	}
?>