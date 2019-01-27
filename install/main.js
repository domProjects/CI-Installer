$(function() {
	$("#db-test").on("click", function() {
		var valHost = $("#db-hostname").val();
		var valUser = $("#db-login").val();
		var valPass = $("#db-password").val();
		var valBase = $("#db-name").val();

		if (valHost && valUser && valBase)
		{
			$.ajax({
				method: "POST",
				url: "install/db_test",
				cache: false,
				data: {
					host: valHost,
					user: valUser,
					pass: valPass,
					base: valBase
				}
			}).done(function(msg) {
				$("#db-result").html(msg);
			}).fail(function(jqXHR, textStatus) {
				console.log("Request failed: " + textStatus);
			});
		}
	});
});