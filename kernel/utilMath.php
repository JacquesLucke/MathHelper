<?php
	function GGT($a, $b)
	{
		while($b != 0)
		{
			$c = fmod($a, $b);
			$a = $b;
			$b = $c;
		}
		return $a;
	}
	
	function KGV($a, $b)
	{
		return $a * $b / GGT($a, $b);
	}
	
	function ReduceFraction(&$a, &$b)
	{
		$ggt = GGT($a, $b);
		$a /= $ggt;
		$b /= $ggt;
		// change sign so that there is no minus or at least at the numerator
		if($a * $b < 0) { $a = -abs($a); $b = abs($b); }
		if($a < 0 && $b < 0) { $a = abs($b); $b = abs($b); }
	}
	
	// a and b are the outputs. $max is the highest possible number for $a and $b; $reduced will run a loop until there is a good fraction
	function GenerateFraction($max, &$a, &$b, $reduced = true)
	{
		do
		{
			$a = rand(1, $max);
			$b = rand(1, $max);	
			if($reduced) ReduceFraction($a, $b);
		} 
		while ($b == 1);
		
	}
	
	// a1/b1 + a2/b2 = resA/resB
	function AddFractions($a1, $b1, $a2, $b2, &$resA, &$resB)
	{
		$resA = $a1 * $b2 + $a2 * $b1;
		$resB = $b1 * $b2;
		ReduceFraction($resA, $resB);
	}
	// a1/b1 - a2/b2 = resA/resB
	function SubtractFractions($a1, $b1, $a2, $b2, &$resA, &$resB)
	{
		$resA = $a1 * $b2 - $a2 * $b1;
		$resB = $b1 * $b2;
		ReduceFraction($resA, $resB);
	}
	// a1/b1 * a2/b2 = resA/resB
	function MultiplyFractions($a1, $b1, $a2, $b2, &$resA, &$resB)
	{
		$resA = $a1 * $a2;
		$resB = $b1 * $b2;
		ReduceFraction($resA, $resB);
	}
	// a1/b1 : a2/b2 = resA/resB
	function DivideFractions($a1, $b1, $a2, $b2, &$resA, &$resB)
	{
		$resA = $a1 * $b2;
		$resB = $b1 * $a2;
		ReduceFraction($resA, $resB);
	}
	
	// -5 -> "-5"     5 -> "+5"
	function AddSignToString($x)
	{
		if($x >= 0) $x = "+$x";
		return $x;
	}
	
	// generates random number
	function RandSpecial($max, $min = 1, $allowZero = true)
	{
		do
		{
			$x = rand($min, $max);
		} 
		while (!$allowZero && $x == 0);
		return $x;
	}
	
	// create a real number with an given amount of decimals
	function GenerateRealNumber($min, $max, $decimals)
	{
		$highNumber = 100000000;
		do
		{
			$x = round(rand(0, $highNumber) / $highNumber * $max + $min, $decimals);
		} 
		while (strlen(explode(".", $x)[1]) != $decimals);
		return $x;
	}
?>