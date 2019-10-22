(function($) {

	$(document).ready(function(){

		// make sure all content shows by default if JS not enabled
		$('.mtm-tabs--title[data-tab!="tab-1"]').removeClass('current');
		$('div.mtm-tabs--content:not(#tab-1)').removeClass('current');
		
		$('.mtm-tabs--title').click(function(){
			var tab_id = $(this).attr('data-tab');

			$('.mtm-tabs--title').removeClass('current');
			$('.mtm-tabs--content').removeClass('current');

			$('.mtm-tabs--title[data-tab="'+tab_id+'"]').addClass('current');
			$("#"+tab_id).addClass('current');
		});

	});

})( jQuery );