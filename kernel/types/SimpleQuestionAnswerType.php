<?php
	class SimpleQuestionAnswerType
	{
		public $question;
		public $answer;
		public $jsMathUse = true;
		public $help = "keine Hilfe zu dieser Aufgabe vorhanden";
	
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
			?>
				<style>
					#question{
						font-size:400%;
						
						margin: 20px;
						margin-top: 60px;
					}
					#resultTextBox{
						font-size: 35px;
						width: 300px;
					}
					#nextTask{
						font-size: 25px;
						margin: 20px;
					}
				</style>
			<?php
		}
		
		public function AddTask()
		{
			if($this->jsMathUse) echo "<div id='question'><div class='math'>". $this->question . "</div></div><br/>";
			else echo "<div id='question'>". $this->question . "</div><br/>";
			?>
				<input id='resultTextBox' onkeyup="CheckResult(); if(event.keyCode == 13) Next();"></input>
				<button onclick="Next()" id="nextTask">Nächste</button>
			<?php
		}
		
		public function AddScript()
		{
			?>
				<script language="javascript">
					var result = "<?=$this->answer?>";
					document.getElementById("resultTextBox").focus();
					function CheckResult()
					{
						var r = document.getElementById("resultTextBox").value;
						if(r == result)
						{
							document.getElementById("resultTextBox").style.backgroundColor = "rgb(153, 255, 196)"
						}
						else
						{
							document.getElementById("resultTextBox").style.backgroundColor = "rgb(255, 188, 183)"
							document.getElementById("resultTextBox").focus();
						}
					} 
					
					function Next()
					{
						window.location.reload();
					}
				</script>
			<?php
		}
		
		public function AddTaskHelp()
		{
			echo $this->help;
		}
	}
?>