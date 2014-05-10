<?php
	function GenerateDecideEquationTask($data)
	{
		$t = new MultipleChoiceType("x^2+2x-10=0", array("lineare Gleichung", "quadratische Gleichung", "biquadratische Gleichung", "sonstiges"), 1);
		$t->help = "Um diese Aufgabe zu lösen, muss man sich die vorhandenen Exponenten an der Variable anschauen.<br/>";
		$t->help .= "keine Exponent oder 1: lineare Gleichung<br/>";
		$t->help .= "2 höchster Exponent: quadratische Gleichung<br/>";
		$t->help .= "4 als höchsten Exponent und optional noch 2: biquadratische Gleichung<br/>";
		$t->help .= "alles andere sind sonstige Gleichungen die sich zum Beispiel 5ten-Grades nennen (je nach dem höchsten Exponenten).";
		return $t;
	}
?>