jQuery(window).bind('load', function() {
	jQuery('.foreground').toggle('slow');
});

jQuery(document).ready(function () {
	
	// Sticky menu
	if ((jQuery(window).width() > 995) && (jQuery('#header .stickup').length)) {
		jQuery('#header .stickup').tmStickUp({});
	}

	// Contact form validation
	var my_form_id = new tFormer('contact-site-form', {
		fields: {
			name: {
				rules: "*"
			},
			mail: {
				rules: "* @"
			},
			subject: {
				rules: "*"
			},
			message: {
				rules: "*"
			}
		}
	});
	
	// Contact form tooltips
	jQuery(".contact-form .form-item-name").append('<div class="error-message">This field is required!</div>');
	jQuery(".contact-form .form-item-mail").append('<div class="error-message">Please enter a valid email address!</div>');
	jQuery(".contact-form .form-item-subject").append('<div class="error-message">This field is required!</div>');
	jQuery(".contact-form .form-item-message .form-textarea-wrapper").append('<div class="error-message">This field is required!</div>');

	jQuery(".dd-search.block-search-form").append('<span class="search-button"><i class="fa fa-search"></i></span>');

	jQuery(".contact-form input[type='reset']").on("click", function($) {
		jQuery(this).parents(".contact-form").find(".error").removeClass("error");
	})
});

jQuery(document).ready(function() {
	jQuery('span.search-button').click(function(){
		jQuery('.dd-search .block-content').toggleClass('active');
	});
	jQuery(document).on('click', function  () {
		if (jQuery('#block-search-form .block-content').hasClass('active')) {
			jQuery('#block-search-form .block-content').removeClass('active');
		}
	})
	jQuery('#block-search-form .block-content, span.search-button').on('click touchstart', function(e){
		e.stopPropagation();
	});
});



// Back to Top Button
jQuery(window).load(function() {
	jQuery().UItoTop({
		easingType: 'easeOutQuart',
		containerID: 'backtotop'
	});
})
