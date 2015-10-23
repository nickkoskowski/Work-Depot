jQuery(document).ready(function(){

	//Account Registration
	
	jQuery('#accountType').change(function(event){
		accountType = jQuery('#accountType').val();
		if (accountType === 'contractor') {
			jQuery('#isLaborer').hide();
			jQuery('#isContractor').show();
		}
		else if (accountType === 'laborer') {
			jQuery('#isContractor').hide();
			jQuery('#isLaborer').show();
		}
	});


	//Job Applications

	jQuery('#jobApply').click(function(event){
		event.preventDefault();
		jQuery('#applicants').slideDown();
	});


});