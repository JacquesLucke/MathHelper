<?php
	class MultipleChoiceType
	{
		public $question;
		public $answers;
		public $answerIndex;
		public $jsMathUse = true;
		public $links = "keine Links zu dieser Aufgabe vorhanden";
		public $help;
		public $taskDescription = "";
	
		public function __construct($question, $answers, $answerIndex)
		{
			$this->question = $question;
			$this->answers = $answers;
			$this->answerIndex = $answerIndex;
		}
	
		public function SetTaskTitle()
		{
			echo "<title>Train Yourself</title>";
		}

		public function AddTaskStyle()
		{
			?><link rel='stylesheet' type='text/css' href='kernel/types/MultipleChoiceType.css'><?php
		}
		
		public function AddTask()
		{
			echo "<div id='completeTask' onkeyup='Next()'>";
				echo "<div id='taskDescription'>". $this->taskDescription ."</div>";
				if($this->jsMathUse) echo "<div id='question'><div class='math'>". $this->question . "</div></div>";
				else echo "<div id='question'>". $this->question . "</div>";
				
				echo "<div id='answerBar'>";
					for($i = 0; $i < count($this->answers); $i++)
					{
						echo "<button class='answerButton' onclick='CheckResult(this)'>". $this->answers[$i] ."</button>";
					}
					echo "<button id='next' onclick='Next()'>Nächste</button>";
				echo "</div>";
			echo "</div>";
		}
		
		public function AddScript()
		{
			?>
				<script>
					var result = "<?= $this->answers[$this->answerIndex] ?>";
				</script>
				<script src="kernel/types/MultipleChoiceType.js"></script>
			<?php
		}
		
		public function AddTaskLinks()
		{
			echo "<div id='taskLinks'><span>". $this->links ."</span></div>";
		}
		
		public function AddHelp()
		{
			echo $this->help;
		}
	}
?>
