$('#nDate').datepicker({dateFormat: 'yy-mm-dd'});
$('#dDate').datepicker({minDate:0,dateFormat: 'yy-mm-dd'});

var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1; //January is 0!
			var yyyy = today.getFullYear();
			if (dd < 10) {
				dd = '0' + dd;
			}
			if (mm < 10) {
				mm = '0' + mm;
			}
			var today = yyyy + '-' + mm + '-' + dd;
			document.getElementById("nDate").value = today;