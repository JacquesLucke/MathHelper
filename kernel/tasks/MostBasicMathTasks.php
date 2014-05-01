<?php
	function GenerateBasicMathTask($data)
	{
		$z1 = rand(2, 100);
		$z2 = rand(2, 100);
		$t = new SimpleQuestionAnswerType($z1 ."+". $z2, $z1 + $z2);
		return $t;
		
	}
?>