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
		return $a * $b / GGT($a, $b);
	}
	
	function ReduceFraction(&$a, &$b)
	{
		$ggt = GGT($a, $b);
		$a /= $ggt;
		$b /= $ggt;
	}
	
	// a1/b1 + a2/b2 = ergA/ergB
	function AddFractions($a1, $b1, $a2, $b2, &$ergA, &$ergB)
	{
		$kgv = KGV($b1, $b2);
		$ergA = ($a1 / $b1 + $a2 / $b2) * $kgv;
		$ergB = $kgv;
		ReduceFraction($ergA, $ergB);
	}
	// a1/b1 - a2/b2 = ergA/ergB
	function SubtractFractions($a1, $b1, $a2, $b2, &$ergA, &$ergB)
	{
		$kgv = KGV($b1, $b2);
		$ergA = ($a1 / $b1 - $a2 / $b2) * $kgv;
		$ergB = $kgv;
		ReduceFraction($ergA, $ergB);
	}
	// a1/b1 * a2/b2 = ergA/ergB
	function MultiplyFractions($a1, $b1, $a2, $b2, &$ergA, &$ergB)
	{
		$ergA = $a1 * $a2;
		$ergB = $b1 * $b2;
		ReduceFraction($ergA, $ergB);
	}
	// a1/b1 : a2/b2 = ergA/ergB
	function DivideFractions($a1, $b1, $a2, $b2, &$ergA, &$ergB)
	{
		$ergA = $a1 * $b2;
		$ergB = $b1 * $a2;
		ReduceFraction($ergA, $ergB);
	}
?>