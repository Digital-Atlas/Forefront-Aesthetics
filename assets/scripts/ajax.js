




// Team Member Metadata Handler

jQuery( document ).on( 'click', '.member a', function(e) {
	e.preventDefault();


	var bioData = jQuery(this).data('bio');
	var proTitleData = jQuery(this).data('protitle');
	var memberIndex = jQuery(this).data('member');

	// If already open, close it
	if (jQuery(this).hasClass('current')) {
		jQuery(this).removeClass('current');
		jQuery("#our-team-target, .member-metadata").empty();
	} else {

	// Else load HTML output
	var outputHTML = '<div class="member-metadata animated fadeInDown">' + proTitleData + bioData + '</div>';
	jQuery(".member a").removeClass('current');
	jQuery(this).addClass('current');

	// Destroy contents and then append
	
			if(jQuery('body').hasClass('is-desktop')) {
				jQuery("#our-team-target").empty().html(outputHTML);
			} else {
				jQuery("#our-team-target").empty().html(outputHTML);
				jQuery('#member-' + memberIndex).append( outputHTML );
			}
	}	

})



// Load Category Posts Ajax Handler

jQuery( document ).on( 'click', '.load-category-posts', function(e) {
	e.preventDefault();
	// Get our category ID
	var cat = jQuery(this).data('cat');
	var rowIndex = jQuery(this).data('row');
	var itemIndex = jQuery(this).data('item');
	var toggleVal = jQuery('#item-' + itemIndex ).data('toggle');



	jQuery.ajax({
		url : ajaxurl,
		type : 'POST',
		dataType: 'html',
		data : {
			'action' : 'fa_category_posts',
			'cat' : cat
		},
		beforeSend : function () {
			// add loader 
		},		
		success : function( response ) {

		// If element already is current, toggle it
		if (jQuery('#item-' + itemIndex ).hasClass('current') && jQuery('.ajax-target').length > 0 ) {
			if(jQuery('body').hasClass('is-desktop')) {
				jQuery('.ajax-target').empty();
				jQuery('#item-' + itemIndex ).removeClass('current');							
			} else {
				jQuery('.treatment-info').empty();
				jQuery('#item-' + itemIndex ).removeClass('current');
			}

		// Else load data
		} else { 

			jQuery('.service').removeClass('current');
			jQuery('#item-' + itemIndex ).addClass('current').attr('data-toggle','ajax-loaded');

			// Target Desktop and Mobile elements to append results

			if(jQuery('body').hasClass('is-desktop')) {
				jQuery('.ajax-target').empty();
				jQuery('#target-' + rowIndex).html(response);
			} else {
				jQuery('.treatment-info').empty(); // Destroy any existing elements
				jQuery('#item-' + itemIndex ).append( response );
			}
		}

			
		},
		error: function( response ) {
			//console.log('error');
		}

	});
})