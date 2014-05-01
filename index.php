<?php
	include("kernel/taskManager.php");

	$task = $_GET['task'];
	
?>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/indexStyle.css">
		
		<?php
			if(isset($task)) 
			{
				AddTaskStyle($task);
				SetTaskTitle($task);
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
					<?php 	if(isset($task)) AddTask($task); ?>
				</div>
				<div id="help">
					<?php if(isset($task)) AddTaskHelp($task); ?>
				</div>
			</div>
			<div id="footer">
				<span>von Jacques Lucke</span>
			</div>
		</div>
	</body>
</html>