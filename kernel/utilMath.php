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
	
	function KGV(&$a, &$b)
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
	
	// a and b are the outputs. $max is the highest possible number for $a and $b
	function GenerateReducedFraction($max, &$a, &$b)
	{
		do
		{
			$a = rand(1, $max);
			$b = rand(1, $max);	
			ReduceFraction($a, $b);
		} 
		while ($b == 1);	
	}
	
	// a1/b1 + a2/b2 = resA/resB
	function AddFractions($a1, $b1, $a2, $b2, &$resA, &$resB)
	{
		$kgv = KGV($b1, $b2);
		$resA = $a1 * $b2 + $a2 * $b1;
		$resB = $kgv;
		ReduceFraction($resA, $resB);
	}
	// a1/b1 - a2/b2 = resA/resB
	function SubtractFractions($a1, $b1, $a2, $b2, &$resA, &$resB)
	{
		$kgv = KGV($b1, $b2);
		$resA = $a1 * $b2 - $a2 * $b1;
		$resB = $kgv;
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
?>