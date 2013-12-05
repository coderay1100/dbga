$(".infobtn").click(function() {

	var jid = {"jid" : $(this).attr("value")};
	
	
	$.ajax({
		url: "async/jobdesc.php",
		type: "GET",
		async: true,
		data: jid,
		success: function(data) {
			$("#detail").html(data);
		}
	});
	
});