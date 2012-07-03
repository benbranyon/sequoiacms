$(document).ready(function () {
	$('#nav-list a').click(function(){
		$(this).next().css("display","");
	});
});