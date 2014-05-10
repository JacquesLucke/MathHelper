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