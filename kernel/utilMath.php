<?php
	function GGT($a, $b)
	{
		if($a == 0) return $b;
		else
		{
			while($b != 0)
			{
				$c = $a % $b;
				$a = $b;
				$b = $c;
			}
			return $a;
		}
	}
	
	function KGV(&$a, &$b)
	{
		$ggt = GGT($a, $b);
		$a *= $ggt;
		$b *= $ggt;
	}
	
	function ReduceFraction(&$a, &$b)
	{
		$ggt = GGT($a, $b);
		$a /= $ggt;
		$b /= $ggt;
	}
?>