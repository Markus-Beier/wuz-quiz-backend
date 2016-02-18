// var divID;
// var mode;	// 0 --> Verkleinern, 1 --> Vergrößern, 2 --> Beides
// var intMin;  // Min. Breite des DIVs
// var intMax;  // Max. Breite des DIVs
// var intStep  // Schrittweite, um die das DIV in seiner Grösse geändert wird
// var intDelay // Verzögerung in Millisekunden
	
var blnBig		= false;
var hTimer		= null;

 
function initResize(divID, mode, heightORwidth, intMin, intMax, intStep, intDelay){
	this.divID = divID;
	this.mode
	this.heightORwidth = heightORwidth;
	this.intMin = intMin;
	this.intMax = intMax;
	this.intStep = intStep;
	this.intDelay = intDelay;
	
	if (mode == 0){
		if (blnBig == true){										// VERGRÖßERN DEAKTIVIERT
			blnBig = (blnBig)? false : true;  // false => verkleinern, true => vergrössern
			// Falls noch ein Timer läuft -> beenden
			if(hTimer != null) window.clearTimeout(hTimer);
			// Resize-Funktion verzögert aufrufen
			hTimer = window.setTimeout("resizeDiv()", intDelay);
		}
	}
	if (mode == 1){
		if (blnBig == false){										// VERKLEINERN DEAKTIVIERT
			blnBig = (blnBig)? false : true;  // false => verkleinern, true => vergrössern
			// Falls noch ein Timer läuft -> beenden
			if(hTimer != null) window.clearTimeout(hTimer);
			// Resize-Funktion verzögert aufrufen
			hTimer = window.setTimeout("resizeDiv()", intDelay);
		}
	}
	if (mode == 2){
		blnBig = (blnBig)? false : true;  // false => verkleinern, true => vergrössern
		// Falls noch ein Timer läuft -> beenden
		if(hTimer != null) window.clearTimeout(hTimer);
		// Resize-Funktion verzögert aufrufen
		hTimer = window.setTimeout("resizeDiv()", intDelay);
	}
}

function resizeDiv(){
	// Vorzeichen zum Vergrössern (1) / Verkleinern (-1) bestimmen
	var intSgn = (blnBig)? 1 : -1;

	// Element ermitteln, das in der Größe verändert werden soll
	var objDiv = document.getElementById(divID);
	if (heightORwidth == 'width' ){
		// Neue Grösse zuweisen
		objDiv.style.width = (parseInt(objDiv.style.width) + intSgn*intStep) + "px";
		// Falls die neue Grösse noch innerhalb der Grenzen liegt -> Resize-Funktion erneut aufrufen
		if((parseInt(objDiv.style.width) >= intMin) && (parseInt(objDiv.style.width) <= intMax)){
			hTimer = window.setTimeout("resizeDiv()", intDelay);
	}
  } else{
		// Neue Grösse zuweisen
		objDiv.style.height = (parseInt(objDiv.style.height) + intSgn*intStep) + "px";
		// Falls die neue Grösse noch innerhalb der Grenzen liegt -> Resize-Funktion erneut aufrufen
		if((parseInt(objDiv.style.height) >= intMin) && (parseInt(objDiv.style.height) <= intMax)){
			hTimer = window.setTimeout("resizeDiv()", intDelay);
	}
  }
}