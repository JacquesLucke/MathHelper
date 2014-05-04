<?php
	class SimpleQuestionAnswerType
	{
		public $question;
		public $answer;
		public $jsMathUse = true;
		public $help = "keine Hilfe zu dieser Aufgabe vorhanden";
		public $inputType = "normal";
	
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
					
					#show{
						float: left;
						width: 33%;
						margin-top: 40px;
					}
					#input{
						float: left;
						width: 33%;
					}
					#next{
						float: left;
						width: 33%;
						margin-top: 40px;
					}
					#showResult{
						float: right;
						margin-right: 50px;
						font-size: 25px;
					}
					table{
						margin-left: auto;
						margin-right: auto;
					}
					#nextTask{
						float: left;
						margin-left: 50px;
						font-size: 25px;
					}
					#normalResultTextBox{
						font-size: 35px;
						width: 200px;
						margin-top: 40px;
					}
					.fractionResult{
						font-size: 25px;
						width: 200px;
					}
					
					#help{
						text-align: left;
					}
					#help span{
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
						<div id="show"><button onmousedown="ShowResult()" id="showResult">L&ouml;sung</button></div>
						<div id="input">
							<?php
								if($this->inputType == "normal") echo "<input id='normalResultTextBox' onkeyup='CheckResult(); if(event.keyCode == 13) Next();'></input>";
								if($this->inputType == "fraction") 
								{
									?>
									<table>
										<tr><td><input class="fractionResult" id='fractionResultTextBoxA' onkeyup='CheckResult(); if(event.keyCode == 13) document.getElementById("fractionResultTextBoxB").focus();'></input></td></tr>
										<tr><td><input class="fractionResult" id='fractionResultTextBoxB' onkeyup='CheckResult(); if(event.keyCode == 13) Next();'></input></td></tr>
									</table>
									<?php
								}
							?>
						</div>
						<div id="next"><button onclick="Next()" id="nextTask">N&auml;chste</button></div>
					</div>
			</div>		
			<?php
		}
		
		public function AddScript()
		{
			?>
				<script language="javascript">
					var result = "<?=$this->answer?>";
					<?php
						if($this->inputType == "normal")
						{ ?>
							document.getElementById("normalResultTextBox").focus();
							document.getElementById("normalResultTextBox").value = "";
							
							function CheckResult()
							{
								var r = document.getElementById("normalResultTextBox").value;
								if(r == result)
								{
									document.getElementById("normalResultTextBox").style.backgroundColor = "rgb(153, 255, 196)";
								}
								else
								{
									document.getElementById("normalResultTextBox").style.backgroundColor = "rgb(255, 188, 183)";
									document.getElementById("normalResultTextBox").focus();
								}
							} 
							
							function ShowResult()
							{
								document.getElementById("normalResultTextBox").value = result;
								document.getElementById("normalResultTextBox").style.backgroundColor = "rgb(153, 255, 196)";
							}
					<?php }
						if($this->inputType == "fraction")
						{ ?>
							document.getElementById("fractionResultTextBoxA").focus();
							document.getElementById("fractionResultTextBoxA").value = "";
							document.getElementById("fractionResultTextBoxB").value = "";
							
							function CheckResult()
							{
								if(result.indexOf("/") > -1) var r = document.getElementById("fractionResultTextBoxA").value + "/" + document.getElementById("fractionResultTextBoxB").value;
								else var r = document.getElementById("fractionResultTextBoxA").value;
								if(r == result)
								{
									document.getElementById("fractionResultTextBoxA").style.backgroundColor = "rgb(153, 255, 196)";
									document.getElementById("fractionResultTextBoxB").style.backgroundColor = "rgb(153, 255, 196)";
								}
								else
								{
									document.getElementById("fractionResultTextBoxA").style.backgroundColor = "rgb(255, 188, 183)";
									document.getElementById("fractionResultTextBoxB").style.backgroundColor = "rgb(255, 188, 183)";
								}
							} 
							
							function ShowResult()
							{
								var fraction = result.split("/");
								
								if(result.indexOf("/") > -1) document.getElementById("fractionResultTextBoxB").value = fraction[1];
								document.getElementById("fractionResultTextBoxA").value = fraction[0];
								document.getElementById("fractionResultTextBoxA").style.backgroundColor = "rgb(153, 255, 196)";
								document.getElementById("fractionResultTextBoxB").style.backgroundColor = "rgb(153, 255, 196)";
							}
					<?php } ?>
							
				function Next()
				{
					window.location.reload();
				}
							
				</script>
			<?php
		}
		
		public function AddTaskHelp()
		{
			echo "<div id='help'><span>". $this->help ."</span></div>";
		}
	}
?>
