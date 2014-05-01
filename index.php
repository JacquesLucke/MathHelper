<?php
	include("kernel/taskManager.php");
	
	$task = GetTaskFromString($_GET['task']);	
?>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/indexStyle.css">
		
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
				nothing done jet
			</div>
			<div id="currentTask">
				<div id="actualTask">
					<?php	$task->AddTask(); ?>
				</div>
				<div id="help">
					<?php 	$ask->AddTaskHelp(); ?>
				</div>
			</div>
			<div id="footer">
				<span>von Jacques Lucke</span>
			</div>
		</div>
	</body>
</html>