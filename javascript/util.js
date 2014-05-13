function CompareStrings(a, b)
{
	a = UnifyChars(a);
	b = UnifyChars(b);
	
	a = ToNumber(a);
	b = ToNumber(b);
	
	
	return a == b;
}

function ToNumber(a)
{
	if(a.indexOf("/") >= 0)
	{
		var part = a.split("/");
		if(IsNumber(part[0]) && IsNumber(part[1]) && part.length == 2)
		{
			return parseFloat(part[0]) / parseFloat(part[1]);
		}
	}	
	return a;
}
function IsNumber(a)
{
	return !isNaN(a);
}

// counts the occurrence of a specific string in another
function CountStrings(text, search)
{
	var re = new RegExp(search, "g");
	var match = text.match(re);
	if(math == null) return 0;
	return text.match(re).length;
}

// replaces different chars for easier comparison later
function UnifyChars(a)
{
	a = a.replace(/,/g, ".");
	a = a.replace(/:/g, "/");
	return a;
}

function GGT(a, b)
{
	while(b != 0)
	{
		var c = a % b;
		a = b;
		b = c;
	}
	return a;
}