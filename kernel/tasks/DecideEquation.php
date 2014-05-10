<?php
	function GenerateDecideEquationTask($data)
	{
		$t = new MultipleChoiceType("x^2+2x-10=0", array("Lösungsformel", "Substitution", "Additionsverfahren", "Einsetzungsverfahren", "Gleichsetzungsverfahren", "Polynomdivision"), 0);
		return $t;
	}
?>