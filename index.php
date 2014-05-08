<?php
	// should be off, when committing to master
	//error_reporting(E_ALL);
    //ini_set('display_errors', 1);

	include("kernel/taskManager.php");
	
	$task = GetTaskFromString($_GET['task']);	
?>


<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<link rel="stylesheet" type="text/css" href="styles/indexStyle.css">
		
		<!-- load jsMath library -->
		<script src="external/jsMath/plugins/noImageFonts.js"></script>
		<script src="external/jsMath/jsMath.js"></script>
		
		<?php
			if(isset($_GET['task'])) 
			{
				$task->AddTaskStyle();
				$task->SetTaskTitle();
			}
			else
			{
				echo "<title>Mathehilfe</title>";
			}
		?>
	</head>
	<body>
		<div id="website">
			<div id="header">
				<h1>Mathehilfe</h1>
			</div>
			<div id="status">
				<a href="?task=MentalMathTasks-.-GenerateMentalMathTask">Zum ersten Aufgabentyp</a>
			</div>
			<div id="currentTask">
				<div id="actualTask">
					<?php	$task->AddTask(); ?>
				</div>
				<div id="links">
					<?php 	$task->AddTaskLinks(); ?>
				</div>
			</div>
			<div id="help">
				<button id="helpSwitchButton" onclick="SwitchHelpWindow()">Wie ging das nochmal?</button>
				<div id="helpWindow"><?php 	$task->AddHelp(); ?></div>
			</div>
			<div id="footer">
				<span>von Jacques Lucke</span>
			</div>
		</div>
		
		<?php 	$task->AddScript(); ?>
		<script>
			jsMath.Process(document);
			
			document.getElementById('helpWindow').style.display = "none";
			function SwitchHelpWindow()
			{
				var help = document.getElementById('helpWindow');
				var button = document.getElementById('helpSwitchButton');
				
				if(help.style.display == "none")
				{
					help.style.display = 'block';
					button.innerHTML = "Hilfe ausblenden";
				}
				else
				{
					help.style.display = 'none';
					button.innerHTML = "Wie ging das nochmal?";
				}
			}
		</script>
	</body>
</html>