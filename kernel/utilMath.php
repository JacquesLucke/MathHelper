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
		$resA = ($a1 / $b1 + $a2 / $b2) * $kgv;
		$resB = $kgv;
		ReduceFraction($resA, $resB);
	}
	// a1/b1 - a2/b2 = resA/resB
	function SubtractFractions($a1, $b1, $a2, $b2, &$resA, &$resB)
	{
		$kgv = KGV($b1, $b2);
		$resA = ($a1 / $b1 - $a2 / $b2) * $kgv;
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