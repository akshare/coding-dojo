$(document).ready(function(){
	//generate images on the fly
	for(var i=0; i<12; i++){
		var ninjaid = "ninjaid-" + i;
		$('#outer_container').prepend('<img src="ninja.jpg" id="' + ninjaid + '">');
	}
	//toggle image
	$('img').click(function(){
		$(this).toggle();
	});
	//show all hidden image or RESET
	$('button').click(function(){
		$('img').show();
	});
});