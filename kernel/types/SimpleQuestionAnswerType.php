<?php
	class SimpleQuestionAnswerType
	{
		private $question;
		private $answer;
	
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
						font-size: 50px;
						
						margin: 20px;
						margin-top: 100px;
					}
					#resultTextBox{
						font-size: 40px;
						width: 300px;
					}
					#checkButton{
						font-size: 30px;
					}
					#output{
						font-size: 30px;
						color:rgb(50, 10, 10);
					}
				</style>
			<?php
		}
		
		public function AddTask()
		{
			echo "<div id='question'>". $this->question . "</div><br/>";
			?>
				<input id='resultTextBox' onkeydown="if(event.keyCode == 13) CheckResult()"></input><br/>
				<button onclick='CheckResult()' id="checkButton" >Vergleichen</button><br/>
				<span id="output"></span>
			<?php
		}
		
		public function AddScript()
		{
			?>
				<script language="javascript">
					var result = <?=$this->answer?>;
					function CheckResult()
					{
						var r = document.getElementById("resultTextBox").value;
						if(r == result)
						{
							document.getElementById("output").innerHTML = "richtig";
							document.getElementById("output").style.color = "rgb(10, 50, 10)"
						}
						else
						{
							document.getElementById("output").innerHTML = "falsch";
							document.getElementById("output").style.color = "rgb(50, 10, 10)"
							document.getElementById("resultTextBox").focus();
						}
					} 
				</script>
			<?php
		}
		
		public function AddTaskHelp()
		{
			echo "hilfe";
		}
	}
?>