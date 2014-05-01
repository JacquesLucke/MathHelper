<?php
	class SimpleQuestionAnswerType extends TaskType
	{
		private $question;
		private $answer;
	
		public function __construct($question, $answer)
		{
			$this->question = $question;
			$this->answer = $answer;
		}
	
		function SetTaskTitle()
		{
			echo "<title>". $this->question ."</title>";
		}

		function AddTaskStyle()
		{
		}
		
		function AddTask()
		{
			echo "Frage: ". $this->question . "<br/>";
			echo "Antwort: ". $this->answer . "<br/>";
		}
		
		function AddTaskHelp()
		{
		}
	}
?>