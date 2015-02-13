$(document).ready(function(){
	//generate images on the fly
	for(var i=1; i<5; i++){
		var ninjaid = "ninjaid-" + i;
		$('#outer_container').append('<img data-alt-src="back/'+ i +'.jpg" src="front/' + i + '.jpg" id="' + ninjaid + '">');
	}

	//replace image
	$('img').hover(function(){
		var afterImg = $(this).attr('data-alt-src');
		var beforeImg = $(this).attr('src');
		$(this).attr('src',afterImg).fadeOut('slow');
		$(this).attr('data-alt-src',beforeImg).fadeIn('slow');
	});
});