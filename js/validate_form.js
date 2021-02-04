"use strict";
var $ = function(id) {return document.getElementById(id);};

var processEntries = function(){
    var email = $("email").value;
    var isValid = true;
    var emailPattern = /((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])/;

    if ($("name").value === "") {
		$("name_error").firstChild.nodeValue = 
                        "This field is required.";
		isValid = false;
    } else { $("name_error").firstChild.nodeValue = ""; }
    
    if(emailPattern.test(email) == false){
        $("email_error").firstChild.nodeValue = "This is not a valid email address."
        isValid = false;
    }
    else{
        $("email_error").firstChild.nodeValue = "";
    }
    
    if ($("message").value === "") {
		$("message_error").firstChild.nodeValue = 
                        "This field is required.";
		isValid = false;
    } else { $("nmessage_error").firstChild.nodeValue = ""; }
    
    if(isValid == true){
        $("sh_contact").submit();
    }
       

};

window.onload = function() {
    $("submit").onclick = processEntries;
    $("email_address").focus();
    startTime();
};
