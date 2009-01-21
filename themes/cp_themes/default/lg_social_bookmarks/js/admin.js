$(document).ready(function(){
	var lg_social_site_checkboxes = $('#social-sites li :checkbox');
	lg_social_site_checkboxes.each(function(index) { updateCheckbox($(this)); });
	lg_social_site_checkboxes.change(function() { updateCheckbox($(this)); });
	$('.lg_sb_select-all').click(function() {
		lg_social_site_checkboxes.attr('checked', 'checked').parent().parent().addClass('active');
		return false;
	});
	$('.lg_sb_select-none').click(function() {
		lg_social_site_checkboxes.attr('checked', '').parent().parent().removeClass('active');
		return false;
	});
	function updateCheckbox(el) {
		if(el.is(':checked')){
			el.parent().parent().addClass('active');
		}
		else{
			el.parent().parent().removeClass('active');
		}
	}
});