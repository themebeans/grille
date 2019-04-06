jQuery( document ).ready( function($) {

	//COLORPICKER
	$('.colorpicker').each(function(){
	  $(this).wpColorPicker();
	});

	//POST FORMAT METABOX SWITCH
	var	$linkSettings  = $('#bean-meta-box-link').hide(),
		$videoSettings = $('#bean-meta-box-video').hide(),
		$audioSettings = $('#bean-meta-box-audio').hide(),
		$gallerySettings = $('#bean-meta-box-gallery').hide(),
		$quoteSettings = $('#bean-meta-box-quote').hide(),
		$postFormat    = $('#post-formats-select input[name="post_format"]');
	$postFormat.each(function() {
		var $this = $(this);
		if( $this.is(':checked') )
			changePostFormat( $this.val() );
	});

	$postFormat.change(function() {
		changePostFormat( $(this).val() );
	});

	function changePostFormat( val ) {
		$linkSettings.hide();
		$videoSettings.hide();
		$audioSettings.hide();
		$gallerySettings.hide();
		$quoteSettings.hide();

		if( val === 'link' ) {
			$linkSettings.show();
		} else if( val === 'video' ) {
			$videoSettings.show();
		} else if( val === 'audio' ) {
			$audioSettings.show();
		} else if( val === 'gallery' ) {
			$gallerySettings.show();
		} else if( val === 'quote' ) {
			$quoteSettings.show();
		}
	}

	//PORTFOLIO FORMAT METABOX SWITCH
	var	portfolioTypeTrigger = jQuery('#_bean_portfolio_type'),
		$portfolioImage  = $('#bean-meta-box-portfolio-images').hide(),
		$portfolioVideo = $('#bean-meta-box-portfolio-video').hide(),
		$portfolioAudio = $('#bean-meta-box-portfolio-audio').hide(),
		currentType = portfolioTypeTrigger.val();

	changePortfolioFormat(currentType);

	portfolioTypeTrigger.change( function() {
	   currentType = jQuery(this).val();
	   changePortfolioFormat(currentType);
	});

	$postFormat.change(function() {
		changePortfolioFormat( $(this).val() );
	});

	function changePortfolioFormat( val ) {
		$portfolioImage.hide();
		$portfolioVideo.hide();
		$portfolioAudio.hide();

		if( val === 'audio' ) {
			$portfolioAudio.show();
		} else if( val === 'video' ) {
			$portfolioVideo.show();
		} else if ( val === 'gallery' ) {
			$portfolioImage.show();
		}
	}
});