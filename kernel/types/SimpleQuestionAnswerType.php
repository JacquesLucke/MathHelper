<?php
	class SimpleQuestionAnswerType
	{
		public $question;
		public $answer;
		public $jsMathUse = true;
		public $links = "keine Links zu dieser Aufgabe vorhanden";
		public $help;
	
		public function __construct($question, $answer)
		{
			$this->question = $question;
			$this->answer = $answer;
		}
	
		public function SetTaskTitle()
		{
			echo "<title>". $this->question ."</title>";
		}

		public function AddTaskStyle()
		{
			?><link rel='stylesheet' type='text/css' href='kernel/types/SimpleQuestionAnswerType.css'><?php
		}
		
		public function AddTask()
		{
			?>
			<div id="completeTask">
				<?php
				if($this->jsMathUse) echo "<div id='question'><div class='math'>". $this->question . "</div></div><br/>";
				else echo "<div id='question'>". $this->question . "</div><br/>";
				?>
					<div id="answerBar">
						<div id="show"><button id="showResultButton" onmousedown="ShowResult()" >L&ouml;sung</button></div>
						<div id="input">
							<input id='resultTextBox' onkeyup='CheckResult(); if(event.keyCode == 13) Next();'></input>
							<div id="operators">
								<button class="inputButton" onclick="AddText('&#x221a;', true)" >&#x221a;</button>
							</div>
						</div>
						<div id="next"><button onclick="Next()" id="nextTaskButton">N&auml;chste</button></div>
					</div>
			</div>		
			<?php
		}
		
		public function AddScript()
		{
			?><script src="kernel/types/SimpleQuestionAnswerType.js"></script><?php
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
