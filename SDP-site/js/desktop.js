function showSearchBar ()
{	
	if(document.getElementById('advancedSearch').style.display == "block") {
		document.getElementById('advancedSearch').style.display = "none";
	}
	else {
		document.getElementById('advancedSearch').style.display = "block";	
	}
}

function sortRequests(sortField)
{
	document.getElementById("SortField").value = sortField.id;
	document.forms["advancedSearch"].submit();
}