$(document).ready(function() {
	$('input[type="radio"]').change(function() {
		$(".output").html('');
		var value = $(this).val();
		var str = "";
		var output = "#checkboxdiv" + value;
		//alert(output);
		switch (value) {
		case "1":
			str = '<p>Duration<br><input  class="form-control" id="duration" /></p>';
		
			$(output).html(str);
			break;
		case "2":
			str = '<p>Working Hours<br><input  class="form-control" id="workhour" /></p>';
		
			$(output).html(str);
			break;
		case "3":
			str = '<p>Salary per Hour<br><input  class="form-control" id="salperhour" /><br>Hours per week<br><input  class="form-control" id="hourperweek" /></p>';
		
			$(output).html(str);
			break;
		case "4":
			str = '<p>Leader<br><input  class="form-control" id="leader" /><br>Goal<br><input  class="form-control" id="goal" /></p>';
		
			$(output).html(str);
			break;
		}
	});
});
