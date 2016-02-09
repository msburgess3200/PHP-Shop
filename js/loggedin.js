function CheckSession(){
	$.ajax({
	   type: "GET",
	   contentType: "application/json; charset=utf-8",
	   url: "./security.php?sec=autopage",
	   data: "{}",
	   dataType: "json",
	   success: function (data) {
			var newdata = data.time - data.account;
			if (newdata >= 900){
				window.location.replace("logout.php?script=1");
				window.location.href = "logout.php?script=1";
			}
	   },
	   error: function (result) {
	   }
	});
}
setInterval(CheckSession, 5000);