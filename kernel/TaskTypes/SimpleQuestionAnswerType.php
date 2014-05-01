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
		}
		
		public function AddTask()
		{
			echo "Frage: ". $this->question . "<br/>";
			echo "Antwort: ". $this->answer . "<br/>";
		}
		
		public function AddTaskHelp()
		{
			echo "hilfe";
		}
	}
?>