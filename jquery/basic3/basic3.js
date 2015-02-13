$(document).ready(function(){
	//generate images on the fly
	for(var i=1; i<6; i++){
		var ninjaid = "ninjaid-" + i;
		$('#outer_container').append('<img data-alt-src="after/' + i + '.jpg" src="before/' + i + '.jpg" id="' + ninjaid + '">');
	}
	//replace image
	$('img').click(function(){
		var afterImg = $(this).attr('data-alt-src');
		var beforeImg = $(this).attr('src');
		$(this).attr('src',afterImg).fadeOut('slow').fadeIn('slow');
		$(this).attr('data-alt-src',beforeImg);
	});
});