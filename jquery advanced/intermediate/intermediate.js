$(document).ready(function(){

	$("#registration").submit(function(){
		var serialize_form = $(":input").serializeArray();
		
		table_data = "<tr>";

		$.each(serialize_form, function(i, field){
 			table_data += "<td>" + field.value + "</td>";
 		});

		table_data += "</tr>";

		console.log(table_data);
		
		$("#table_output tbody").append(table_data); //Does not seem to work

		return false;
	});
});