var container = document.querySelector('#gallery');
var msnry = new Masonry( container, {
	itemSelector: '.item',
	columnWidth: 178,
	gutter: 10,
	isFitWidth: true
});
$(document).ready(function() {
	$('.fancybox').fancybox({
		helpers: {
			title: {
				type: 'over'
			}
		}
	});
});