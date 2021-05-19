

window.addEventListener("scroll", function(event) {
	APBStickyMenu.init();
});

jQuery(document).ready(function(){
	// jQuery('.services-owl-carousel').owlCarousel({
	// 	loop:true,
	// 	margin:10,
	// 	nav:false
	// });

	var owl = jQuery('#services-lead .owl-carousel');
	owl.owlCarousel({
		stagePadding: 50,
		margin: 10,
		center: true,
		nav: false,
		loop: true,
		responsive: {
			0: {items: 1},
			480: {items: 2},
			992: {items: 3}
		}
	});

	setTimeout(resizeLeads, 500);

});



function resizeLeads() {
	var maxheight = 0;
	jQuery('.lead-heading').each(function() {
		var newHeight = jQuery(this).outerHeight();
		if( newHeight >= maxheight ) {
			maxheight = newHeight;
		}
	});
	jQuery('.lead-heading').each(function() {
		jQuery(this).css({
			"min-height" : maxheight+"px"
		});
	});
}