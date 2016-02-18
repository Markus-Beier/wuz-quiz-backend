var boolean_login		= false;
var intMax				= 0;

function calc(){
	var divID = 'login_frame';
	var objDiv = document.getElementById(divID);
	var intElemOffsetHeight = (parseInt(objDiv.offsetHeight));
	var intMax = intElemOffsetHeight - 8;
	return intMax;
}

function initLogin(){
	boolean_login = (boolean_login)? false : true;
	if (boolean_login)
		initLoginOpen();
	else
		initLoginClose();
}

function initLoginOpen(){
		initOpacity('popup-background',0.0,0.6,0.01,0);
		initResize('divID_login',1,'height',31,calc(),2,0);
		document.getElementById('login').style.color = 'rgba(108, 213, 192, 1.0)';
}
function initLoginClose(){
		initOpacity('popup-background',0.0,0.6,0.01,0);
		initResize('divID_login',0,'height',31,calc(),2,0);
		document.getElementById('login').style.color = 'rgba(52, 73, 94, 1.0)';
}