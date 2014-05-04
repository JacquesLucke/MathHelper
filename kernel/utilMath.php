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
	
	class Fraction
	{
		// numerator, so short to keep the usage simple
		public $a = 1;
		// denominator
		public $b = 1;
		
		public function __construct($numerator, $denominator)
		{
			$this->a = $numerator;
			$this->b = $denominator;
		}
		
		public function Reduce()
		{
			$ggt = GGT($this->a, $this->b);
			$this->a *= $ggt;
			$this->b *= $ggt;
		}
	}
?>