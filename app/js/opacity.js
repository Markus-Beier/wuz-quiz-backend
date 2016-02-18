var boolean_opacity		= false;
var hTimer_opacity		= null;

 
function initOpacity(divID_opacity, floatMin_opacity, floatMax_opacity, floatStep_opacity, intDelay_opacity){
	this.divID_opacity = divID_opacity;
	this.floatMin_opacity = floatMin_opacity;
	this.floatMax_opacity = floatMax_opacity;
	this.floatStep_opacity = floatStep_opacity;
	this.intDelay_opacity = intDelay_opacity;
	
	boolean_opacity = (boolean_opacity)? false : true;
	if(hTimer_opacity != null) window.clearTimeout(hTimer_opacity);
	hTimer_opacity = window.setTimeout("opacityDiv()", intDelay_opacity);
}

function opacityDiv(){
	var objDiv = document.getElementById(divID_opacity);
	
	if (boolean_opacity){
		document.getElementById('popup-background').style.display = 'block';
		objDiv.style.opacity = (parseFloat(objDiv.style.opacity) + floatStep_opacity);
		if((parseFloat(objDiv.style.opacity) >= floatMin_opacity) && (parseFloat(objDiv.style.opacity) <= floatMax_opacity)){
			hTimer_opacity = window.setTimeout("opacityDiv()", intDelay_opacity);
	  }
	  
  } else{
		objDiv.style.opacity = (parseFloat(objDiv.style.opacity) - floatStep_opacity);
		if((parseFloat(objDiv.style.opacity) >= floatMin_opacity) && (parseFloat(objDiv.style.opacity) <= floatMax_opacity)){
			hTimer_opacity = window.setTimeout("opacityDiv()", intDelay_opacity);
	  }else{
		document.getElementById('popup-background').style.display = 'none';  
	  }
  }
}