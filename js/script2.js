$(document).ready(function(){

	var old_text;
		
	$(".inputs").focus(function(){
		old_text = $(this).val();
	});

	$(".inputs").blur(function(){
		var id = $(this).parent().parent().attr("id");
		var idV = $(this).attr("id");
		var type = $(this).parent().parent().attr("type");
		var name = $(this).attr("name");
		var new_text = $(this).val();

	
			if(old_text != new_text){
				updateData(id, name, idV, new_text);
			}

	});

});

function updateData(id, name, idV, new_text){

	$.ajax({
	type: 'post',
	url: '/boneels/update_data.php',
	data: {
		id:id,
		name:name,
		idV:idV,
		new_text:new_text,
	},
	success: function (response) {
	// We get the element having id of display_info and put the response inside it
		//console.log(response);
		$('#modal').openModal();
		$('#message').html("Information Uploaded");
		setTimeout(function(){
		    location.reload();
		}, 500);
	}
	});
}