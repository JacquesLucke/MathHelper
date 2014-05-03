<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 1);

	include("kernel/taskManager.php");
	
	$task = GetTaskFromString($_GET['task']);	
?>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/indexStyle.css">
		<script src="external/plugins/noImageFonts.js"></script>
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
				<div id="help">
					<?php 	$task->AddTaskHelp(); ?>
				</div>
			</div>
			<div id="footer">
				<span>von Jacques Lucke</span>
			</div>
		</div>
		
		<?php 	$task->AddScript(); ?>
		<script>
			jsMath.Process(document);
		</script>
	</body>
</html>