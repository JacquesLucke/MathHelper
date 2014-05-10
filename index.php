<?php
	header('Content-type: text/html; charset=utf-8;');
	// should be off, when committing to master
	//error_reporting(E_ALL);
    //ini_set('display_errors', 1);

	include("kernel/taskManager.php");
	include("kernel/helpRedirect.php");
	
	$task = GetTaskFromString(GetTaskDescription());	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="author" content="Jacques Lucke" />

	
		<!-- load jsMath library -->
		<script src="external/jsMath/plugins/noImageFonts.js"></script>
		<script src="external/jsMath/jsMath.js"></script>
		
		<!-- load css -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/indexStyle.css">
		
		<?php
			if(isset($task)) 
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
				<div id="headline"><h1>Train Yourself</h1></div>
			</div>
			<div id="status">
				<a href="Grundaufgaben">Zum ersten Aufgabentyp</a>
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
				<div id="helpWindow"><?php 	$task->AddHelp(); ?></div>
				<button id="switchHelpButton" onclick="SwitchHelpWindow()">Wie ging das nochmal?</button>
			</div>
			<div id="footer">
				<span>von Jacques Lucke</span>
			</div>
		</div>
		
		<?php 	$task->AddScript(); ?>
		<script>
			jsMath.Process(document);
			
			document.getElementById('helpWindow').style.display = "none";
			if(document.getElementById('helpWindow').innerHTML == "")
			{
				document.getElementById('switchHelpButton').style.display = "none";
			}
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