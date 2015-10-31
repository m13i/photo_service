$(document).ready(function(){
		$("#nav").on("click","a", function (event) {
			event.preventDefault();
			var id  = $(this).attr('href'),
			top = $(id).offset().top;
			$('body,html').animate({scrollTop: top}, 500);
		});
});

$(document).ready(function(){
	$('#learnMore').click(function(event){
		event.preventDefault();
		var id = $(this).attr('href');
		var top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 500);
	});
});