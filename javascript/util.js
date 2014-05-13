function CompareStrings(a, b)
{
	a = UnifyChars(a);
	b = UnifyChars(b);
	return a == b;
}

// replaces different chars for easier comparison later
function UnifyChars(a)
{
	a = a.replace(/,/g, ".");
	a = a.replace(/:/g, "/");
	return a;
}