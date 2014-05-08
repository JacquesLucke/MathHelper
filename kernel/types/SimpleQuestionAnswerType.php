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
			?>
				<style>
					
					#completeTask{
						position: relative;
						height: 500px;
					}
				
						#question{
							font-size:400%;
							
							margin: 20px;
							margin-top: 60px;
						}
						
						#answerBar{
							position: absolute;
							bottom: 0px;
							right: 20px;
							left: 20px;
						}
							/* show result button */
							#show{
								float: left;
								width: 33%;
								margin-top: 40px;
							}
								#showResultButton{
									float: right;
									margin-right: 50px;
									font-size: 25px;
								}
							
							/* input textbox */
							#input{
								float: left;
								width: 33%;
							}
								#resultTextBox{
									font-size: 35px;
									width: 200px;
									margin-top: 40px;
									margin-bottom: 5px;
								}
								.inputButton{
									font-size: 25px;
									width: 40px;
									background-color: rgb(210, 210, 210);
									margin: 0px;
								}
							
							/* next task button */
							#next{
								float: left;
								width: 33%;
								margin-top: 40px;
							}
								#nextTaskButton{
									float: left;
									margin-left: 50px;
									font-size: 25px;
								}
						
					#links{
						text-align: left;
					}
					#links span{
						margin:10px;
						display:block;
					}
				</style>
			<?php
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
			?>
				<script language="javascript" charset="UTF-8">
					var result = "<?=$this->answer?>";
					document.getElementById("resultTextBox").focus();
					document.getElementById("resultTextBox").value = "";
					
					function CheckResult()
					{
						var r = document.getElementById("resultTextBox").value;
						r = r.replace(/,/g, ".");
						if(r == result)
						{
							document.getElementById("resultTextBox").style.backgroundColor = "rgb(153, 255, 196)";
						}
						else
						{
							document.getElementById("resultTextBox").style.backgroundColor = "rgb(255, 188, 183)";
							document.getElementById("resultTextBox").focus();
						}
					} 
					
					function ShowResult()
					{
						document.getElementById("resultTextBox").value = result;
						document.getElementById("resultTextBox").style.backgroundColor = "rgb(153, 255, 196)";
					}		

					function Next()
					{
						window.location.reload();
					}
					
					function AddText(text, addBrackets)
					{
						var position = document.getElementById("resultTextBox").selectionStart;
						var end = document.getElementById("resultTextBox").selectionEnd;
						document.getElementById("resultTextBox").value = Insert(document.getElementById("resultTextBox").value, text, position);
						document.getElementById("resultTextBox").setSelectionRange(position + 1, position + 1);
						
						if(addBrackets)
						{
							document.getElementById("resultTextBox").value = Insert(document.getElementById("resultTextBox").value, "(", position + 1);
							document.getElementById("resultTextBox").value = Insert(document.getElementById("resultTextBox").value, ")", end + 2);
							
							if(position == end)
							{
								document.getElementById("resultTextBox").setSelectionRange(position + 2, position + 2);
							}
						}
						
						
					}
					
					function Insert(text, insertion, position)
					{
						return text.substr(0, position) + insertion + text.substr(position);
					}
				</script>
			<?php
		}
		
		public function AddTaskLinks()
		{
			echo "<div id='links'><span>". $this->links ."</span></div>";
		}
		
		public function AddHelp()
		{
			echo $this->help;
		}
	}
?>
