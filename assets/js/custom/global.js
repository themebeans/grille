/**
* Theme javascript functions file.
*
*/
( function( a ) {
	"use strict";

	var
	body = a( 'body' ),
	container = a( '#isotope-container' );

	/**
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */
	function supportsInlineSVG() {
		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
	}

	/* Document Ready */
	a(document).ready(function() {

		supportsInlineSVG();

		if ( true === supportsInlineSVG() ) {
            		document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
        	}

	});

	/* Portfolio Isotope */
	function isotope() {

		container.imagesLoaded( function() {

			container.isotope({
				transitionDuration: '0.2s',
				itemSelector: '.isotope-item',
				resizesContainer: true,
				isResizeBound: true,
				layoutMode: 'masonry',
				hiddenStyle: {
					opacity: 0
				},
				visibleStyle: {
					opacity: 1
				}
			});

			/* Portfolio Filtering */
			a('#filter a').on( 'click', function(e) {
				var
				b = a(this).attr('data-filter'),
				c = a("#filter a"),
				d = ("active"),
				s = ("shown");

				e.preventDefault();
				container.isotope({ filter: b });
				c.removeClass(d);
				jQuery(this).addClass(d);
				return false;
			});

			/* Portfolio Infinite scrolling */
			container.infinitescroll({
				navSelector  : '#page_nav',
				nextSelector : '#page_nav a',
				itemSelector : '.isotope-item',
			},

			function( newElements ) {

				var newElems = a( newElements );

				newElems.imagesLoaded(function(){
					container.isotope( 'appended', newElems, true );
					a('.format-video').fitVids('appended', newElems);
				});

			});
		});

	}

	a(window).load(function() {
		isotope();
	});

} )( jQuery );


// IF JS IS ENABLED, REMOVE 'no-js' AND ADD 'js' CLASS
jQuery('html').removeClass('no-js').addClass('js');

/**
 * Setup a globally accessible object that contains an array property with list of functions
 * to be called by Isotope Infinite Scrolling whenever new elements are pulled via AJAX
 */
var Bean_Isotope = Bean_Isotope || {};
Bean_Isotope.callAfterNewElements = [];

jQuery(document).ready(function($) {

	//FITVIDS
	$("body").fitVids();

	//RESPONSIVE MENU
	$('#mobile-nav').meanmenu();

  	//FORM VALIDATION
	if (jQuery().validate) { jQuery("#commentform").validate(); }

	//BEAN LIKES
	$("span.likes a:not(.active)").click(function () {
	$('span.bean-like-icon').addClass('animated BeanLikeAnimation');
	});

	Bean_Likes.Bean_Likes_Init();
	Bean_Media.setupAudioPosts();
	Bean_Media.setupVideoPosts();

	Bean_Isotope.callAfterNewElements.push(Bean_Likes.Bean_Likes_Init);
	Bean_Isotope.callAfterNewElements.push(Bean_Media.setupAudioPosts);
	Bean_Isotope.callAfterNewElements.push(Bean_Media.setupVideoPosts);
});

//BEAN LIKES FUNCTIONS
var Bean_Likes = {
	Bean_Reload_Likes: function(who) {
	var text = jQuery("#" + who).html();
	var patt= /(\d)+/;

	var num = patt.exec(text);
	num[0]++;
	text = text.replace(patt,num[0]);
	jQuery("#" + who).html('<span class="count">' + text + '</span>');
	},

	Bean_Likes_Init: function() {
	jQuery(".bean-likes").click(function() {
		var classes = jQuery(this).attr("class");
		classes = classes.split(" ");

		if(classes[1] == "active") {
			return false;
		}
		var classes = jQuery(this).addClass("active");
		var id = jQuery(this).attr("id");
		id = id.split("like-");
		jQuery.ajax({
		  type: "POST",
		  url: "index.php",
		  data: "likepost=" + id[1],
		  success: Bean_Likes.Bean_Reload_Likes("like-" + id[1])
		});
		return false;
	});
	}
};

// FUNCTIONS FOR HANDLING POSTS OF TYPE 'AUDIO' AND 'VIDEO'
var Bean_Media = {
	setupAudioPosts: function() {

		if(jQuery().jPlayer) {
			jQuery(".jp-audio").each(function() {
				var mp3 = jQuery(this).data("file");
				var cssSelectorAncestor = '#' + jQuery(this).attr("id");

				jQuery(this).find(".jp-jplayer").jPlayer( {
					ready : function () {
							jQuery(this).jPlayer("setMedia", {
							mp3: mp3,
							end: ""
						});
					},
					size: {
					    width: "100%",
					},
					swfPath: WP_TEMPLATE_DIRECTORY_URI[0] + "/assets/js",
					cssSelectorAncestor: cssSelectorAncestor,
					supplied: (mp3 ? "mp3": "") + ", all"
				});
			});
		}
		jQuery(".jp-audio .jp-interface").css("display", "block");

	},

	setupVideoPosts: function() {
		jQuery('.jp-video').each(function() {
			var m4v = jQuery(this).data("file");
			var poster = jQuery(this).data("poster");

			var cssSelectorAncestor = '#' + jQuery(this).attr("id");

			jQuery(this).find(".jp-jplayer").jPlayer( { ready : function () {
			jQuery(this).jPlayer(
				'setMedia', {
						m4v: m4v,
						poster: poster
						}
					);
				},
				preload: 'auto',
				cssSelectorAncestor : cssSelectorAncestor,
				swfPath: WP_TEMPLATE_DIRECTORY_URI[0] + "/assets/js",
				supplied: (m4v ? "m4v":"") + ", all",
				size : {
					width : '100%',
					height: "100%"
				},
				wmode : 'window'
			});
		});
		jQuery(".jp-video .jp-interface").css("display", "block");
	}
};
