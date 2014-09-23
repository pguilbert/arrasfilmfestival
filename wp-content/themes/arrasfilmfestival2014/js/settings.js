var container = document.querySelector('#gallery');
var msnry = new Masonry( container, {
	itemSelector: '.item',
	columnWidth: 178,
	gutter: 10,
	isFitWidth: true
});
$('.fancybox').fancybox();