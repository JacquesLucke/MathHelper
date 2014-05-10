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
			?>
				<style>
					#completeTask{
						position: relative;
						height: 100%;
						border: 1px solid rgba(0, 0, 0, 0);
					}
					#taskDescription{
						font-size: 120%;
					}
					#question{
						font-size: 300%;
						
						margin: 20px;
						margin-top: 60px;
					}
					#answerBar{
						position: absolute;
						bottom: 10px;
						right: 20px;
						left: 20px;
					}
					.answerButton{
						font-size: 20px;
						float: left;
						margin: 5px;
					}
					#next{
						font-size: 25px;
						float: right;
						margin: 5px;
					}
					
					#taskLinks{
						text-align: left;
					}
					#taskLinks span{
						margin:10px;
						display:block;
					}
				</style>
			<?php
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
					var ignoreClicks = false;
					function CheckResult(element)
					{
						if(!ignoreClicks)
						{
							element.style.border = "2px solid black";
							ShowResult();
						}
						ignoreClicks = true;
					}
					
					function ShowResult()
					{
						var elements = document.getElementsByClassName("answerButton");
						for(var i = 0; i < elements.length; i++)
						{
							if(elements[i].innerHTML == result)
							{
								elements[i].style.backgroundColor = "rgb(153, 255, 196)";
							}
							else
							{
								elements[i].style.backgroundColor = "rgb(255, 188, 183)";
							}
						}
					}
					
					function Next()
					{
						window.location.reload();
					}
				</script>
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
