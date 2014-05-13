// compares to strings with numbers and fractions in it
function CompareStrings(a, b, options)
{
	a = UnifyChars(a);
	b = UnifyChars(b);
	
	if(typeof options === "undefined" || options == "")
	{
		a = ToNumber(a);
		b = ToNumber(b);
	}
	
	if(options == "reduced fraction")
	{
		a = CorrectFraction(a);
		b = CorrectFraction(b);
	}
	
	return a == b;
}

// converts a fraction to a number to compare them
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

// corrects signs
function CorrectFraction(a)
{
	var part = a.split("/");
	// make both positive when they are both negative or only the first is negative
	if(part[0] * part[1] >= 0) 	part[0] = Math.abs(part[0]);
	else part[0] = -Math.abs(part[0]);
	part[1] = Math.abs(part[1]);
	
	return part[0] + "/" + part[1];
}

// checks if a variable is a valid number
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