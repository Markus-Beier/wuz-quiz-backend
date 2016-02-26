function setFocusToTextBox(id){
	setTimeout(function(){setFocus(id);}, 200);
	function setFocus(id){
		document.getElementById(id).focus();
	}
}
function stopBubble(e){
	if (!e)
		var e = window.event;
	e.cancelBubble = true;
	if (e.stopPropagation)
		e.stopPropagation();
}
