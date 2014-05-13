document.getElementById("resultTextBox").focus();
document.getElementById("resultTextBox").value = "";

function CheckResult()
{
	var r = document.getElementById("resultTextBox").value;
	if(CompareStrings(r, result))
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