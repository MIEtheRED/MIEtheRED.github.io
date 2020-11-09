"use strict";
var $ = function(id){return document.getElementById(id);};

var toggle = function(){
    var link = this;
    var h2 = link.parentNode;
    var div = h2.nextElementSibling;

    if(div.style.display === "block"){
        div.style.display = "none";
    }
    else{
        div.style.display = "block";
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
    var faqs = $("faqs");
    var linkElements = faqs.getElementsByTagName("a");
       
    for (var i = 0; i < linkElements.length; i++ ) {
    	linkElements[i].onclick = toggle;
    }
    linkElements[0].focus();
    
    startTime();
};