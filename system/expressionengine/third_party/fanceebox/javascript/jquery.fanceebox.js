$(document).ready(function() {

	/* Single image with some animations and a few extras */
	
	$("a.fancy_image").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false,
		'autoScale'		:	false,
		'scrolling'		: 	'auto'
	});
	
	/* Using custom settings */
	
	$("a.fancy_inline").fancybox({
		'transitionIn'		:	'elastic',
		'transitionOut'		:	'elastic',
		'speedIn'			:	600, 
		'speedOut'			:	200, 
		'overlayShow'		:	false,
		'autoScale'			:	false,
		'hideOnContentClick': 	true,
		'scrolling'			: 	'auto'
	});

	/* For a gallery of multiple items use the same rel tag on each image you want in the gallery - example rel="group1" */
	
	$("a.fancy_group").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false,
		'autoScale'		:	false,
		'scrolling'		: 	'auto'
	});
	
	/* This is for the iframe */
	
	$("a.fancy_iframe").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false,
		'width' 		:	'75%',
		'height' 		:	'75%',
		'autoScale' 	:	false,
		'type' 			:	'iframe'
	});
	
	/* This is for use with Flexible Admin - add ?iframe to the end of you custom links */
	
	$('a[href$="?iframe"]').fancybox({
    'transitionIn'		:	'elastic',
    'transitionOut'		:	'elastic',
    'speedIn'			:	600, 
    'speedOut'			:	200, 
    'overlayShow'		:	false,
    'width'				:	'75%',
    'height'			:	'75%',
    'autoScale'			:	false,
    'type'				:	'iframe'
	}); 
});