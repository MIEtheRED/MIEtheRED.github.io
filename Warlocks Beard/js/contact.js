"use strict";
var $ = function(id) {return document.getElementById(id);};

var processEntries = function(){
    var email = $("email_address").value;
    var phone = $("phone_number").value;
    var contact = "Text";
    var isValid = true;
    var phonePattern = /\D?[0-9]{3}\D?\s?[0-9]{3}\D?\s?[0-9]{4}/;
    var emailPattern = /((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])/;

    if ($("email").checked) { contact = "Email"; }
    if ($("mobile").checked) { contact = "Mobile"; }
    if ($("none").checked) { contact = "None"; }
    
    if ($("first_name").value === "") {
		$("first_name_error").firstChild.nodeValue = 
                        "This field is required.";
		isValid = false;
    } else { $("first_name_error").firstChild.nodeValue = ""; }
    
    if ($("last_name").value === "") {
		$("last_name_error").firstChild.nodeValue = 
                        "This field is required.";
		isValid = false;
    } else { $("last_name_error").firstChild.nodeValue = ""; }
    
    if(emailPattern.test(email) == false){
        $("email_address_error").firstChild.nodeValue = "This is not a valid email address."
        isValid = false;
    }
    else{
        $("email_address_error").firstChild.nodeValue = "";
    }

    if(phonePattern.test(phone) == false){
        $("phone_number_error").firstChild.nodeValue = "This is not a valid phone number."
        isValid = false;
    }
    else{
        $("phone_number_error").firstChild.nodeValue = "";
    }
    
    if(isValid == true){
        $("contact_form").submit();
    }
       

};

var resetForm = function() {
    $("contact_form").reset();
    $("email_address").focus();
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
    $("confirm_submit").onclick = processEntries;
    $("reset_form").onclick = resetForm;    
    $("email_address").focus();
    startTime();
};
