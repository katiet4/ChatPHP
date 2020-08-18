function encrypt(text) {
	var crypt = "";
	for (var i = text.length - 1; i >= 0; i--) {
		crypt += text[i].charCodeAt(0) + "O";
	}
	return crypt;
}

function decrypt(crypt) {
	crypt = crypt.split('O');
	var text = "";
	for (var i = crypt.length - 1; i >= 0; i--) {
		text += String.fromCharCode(crypt[i]);
	}
	return text;
}


var idBackArea = document.getElementsByName("idofchat")[0].value;
var inputId = document.getElementsByName("text-" + idBackArea)[0];



function update_messages_of_chat(idOfArea) {
	inputId.addEventListener('keyup', function onEvent(e){if(e.keyCode === 13){send_message(idBackArea);}});
	$.ajax({
	    type: "POST",
	    url: "ajax_quest.php",
	    data: {chat:idOfArea}
	}).done(function( result )
	    {
	    	var HTML = "";
	    	result = JSON.parse(result);
	    	for (var i = 0; i < result[0].length; i++) {
	    		result0I = result[0][i].replace(/<\/?[^>]+(>|$)/g, "");
	    		result1I = decrypt(result[1][i]).replace(/<\/?[^>]+(>|$)/g, "");
	    		HTML += '<p><span style="color: '+result[2][i]+';font-weight: 750;" >'+result0I+': </span><span style="color: blue;font-weight: 750;" ></span><span>'+result1I+'</span></p>';
	    	}
	        $("#area-"+idOfArea).html(HTML);
	    });
}
function send_message(idOfArea) {
	var text = document.getElementsByName("text-"+idBackArea)[0].value;
	if (text != ""){
		var NS = document.getElementsByName("nameofsender")[0].value;
		var info = $.ajax({
	        type: "POST",
	        url: "ajax_send_message.php",
	        data: {chat:idOfArea, message:encrypt(text), nameofsender:NS}
	    })
	    document.getElementsByName("text-"+idBackArea)[0].value = "";
	    update_messages_of_chat(idOfArea);
}

}
function close_creator_chats() {
	document.getElementById("creator").style.display ="none";
}
function open_creator_chats() {
	document.getElementById("creator").style.display ="block";
}
function open_any_chat(idOfArea) {
	document.getElementById("area-"+idBackArea).style.display ="none";
	document.getElementById("area-"+idOfArea).style.display = "block";
	document.getElementById("input-"+idBackArea).style.display ="none";
	document.getElementById("input-"+idOfArea).style.display = "block";
	idBackArea = idOfArea;
	update_messages_of_chat(idOfArea);
	inputId = document.getElementsByName("text-" + idBackArea)[0];
}
open_any_chat(idBackArea);
setInterval( () => {
update_messages_of_chat(idBackArea)
}, 1500);
