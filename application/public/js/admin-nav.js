$(document).ready(function(){

	$('#nav-list li').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });

});