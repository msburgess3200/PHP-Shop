/*
	***********************************
			THIS FILE IS PROPERTY
			OF TSS3, INC.
			YOU MAY NOT USE, MODIFY,
			OR REDIST., WITHOUT
			WRITTEN PERMISSION FROM
			IT'S OWNER.
	***********************************
*/
$('input#passwordBox').focus(function(){
	if($(this).val() == "password"){
		$(this).val("");
	}
$(this).blur(function(){
	if($(this).val() == ""){
		$(this).val("password");
	}
});
});
$('input#usernameBox').focus(function(){
	if($(this).val() == "john.doe"){
		$(this).val("");
	}
$(this).blur(function(){
	if($(this).val() == ""){
		$(this).val("john.doe");
	}
});
});

function CheckLogin(){
		if($("input#usernameBox").val() == "john.doe"){
			alert("Please enter a valid username.");
			return false;
	}
		if($("input#usernameBox").val() == ""){
			alert("Please enter a valid username.");
			return false;
	}	
		if($("input#passwordBox").val() == "password"){
			alert("Please enter a valid password.");
			return false;
	}	
		if($("input#passwordBox").val() == ""){
			alert("Please enter a valid password.");
			return false;
	}
}