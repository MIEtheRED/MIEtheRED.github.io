"use strict";
var $ = function(id) {
    return document.getElementById(id);
}

var joinList = function() {
  var emailAddress = $("email_address").value;
  var emailPattern = /((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])/;
	var isValid = true;

	if(emailPattern.test(emailAddress) == false){
    $("email_address_error").firstChild.nodeValue = "This is not a valid email address."
    isValid = false;
  }
  else{
      $("email_address_error").firstChild.nodeValue = "";
  }
  
	if (isValid) {
		$("email_form").submit(); 
	}
};

//script for the footer's clock
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
  }
  function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
  }

window.onload = function() {
    $("join_list").onclick = joinList;
	$("email_address").focus();
	startTime();
}
