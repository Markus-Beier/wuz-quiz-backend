function initDisplay(divID_display, intDelay_display){
	this.divID_display = divID_display;
	window.setTimeout("displayObjDiv(divID_display)", intDelay_display);
}

function displayObjDiv(divID_display){
	var objDiv = document.getElementById(divID_display);
	if (objDiv.style.display != 'inline')
		objDiv.style.display = 'inline';
	else
		objDiv.style.display = 'none';
}