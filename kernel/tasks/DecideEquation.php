<?php
	function GenerateDecideEquationTask($data)
	{
		$t = new MultipleChoiceType("x^2+2x-10=0", array("lineare Gleichung", "quadratische Gleichung", "biquadratische Gleichung", "sonstiges"), 1);
		
		$t->links = "<a href='grundaufgaben'>alle üben</a></br>";
		$t->links .= "<a href='brueche'>Brüche üben</a></br>";
		
		$t->help = "Um diese Aufgabe zu lösen, muss man sich die vorhandenen Exponenten an der Variable anschauen.<br/>";
		$t->help .= "<br/>";
		$t->help .= "<ul type='circle'>";
		$t->help .= "<li>keine Exponent oder 1: lineare Gleichung</li>";
		$t->help .= "<li>2 höchster Exponent: quadratische Gleichung</li>";
		$t->help .= "<li>4 als höchsten Exponent und optional noch 2: biquadratische Gleichung</li>";
		$t->help .= "<li>alles andere sind sonstige Gleichungen die sich zum Beispiel 5ten-Grades nennen (je nach dem höchsten Exponenten).</li>";
		$t->help .= "</ul>";
		
		return $t;
	}
?>