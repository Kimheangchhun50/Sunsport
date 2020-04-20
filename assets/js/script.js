jQuery(document).ready(function($){
	// Date change
	$('.dashboard').on('change', '#the_date', function(){
		window.location.href = window.location.origin+window.location.pathname+'?date='+$(this).val();
	});

	// Cancel | Hide form
	$('.main').on('click', '.close', function(){
		$('.form-booking').fadeOut();
	});


	// Response
	$('.btn-close-response').click(function(){
		$(this.parentNode).fadeOut(100, function(){
			$(this).remove();
		});
	});
	// setTimeout(function(){
	// 	if( $('.response').length>0 ){
	// 		$('.response').fadeOut(100, function(){
	// 			$(this).remove();
	// 		});
	// 	}
	// }, 5000);

	// Add new booking
	$('.dashboard').on('click', '.add-booking', function(){
		var the_date = $('#the_date').val();
		var the_time = $(this).attr('data-time');
		var the_field = $(this).attr('data-field');
		var the_price = $(this).attr('data-price');
		$('.form-booking-new').fadeIn();
		$($('.form-booking-new').find('[name=the_date]')[0]).val(the_date);
		$($('.form-booking-new').find('[name=the_time]')[0]).val(the_time);
		$($('.form-booking-new').find('[name=the_field]')[0]).val(the_field);
		$($('.form-booking-new').find('[name=the_price]')[0]).val(the_price);
	});
	console.log(SITE_URL);
	$('.dashboard').on('click', '.edit-booking', function(){
		var self = this;
		var id = $(self).attr('data-id');
		var link = SITE_URL+'/edit-booking/?id='+id+' #form-booking-edit';
		console.log(link);
		$('#view').load(link, function(){
			$($(this).find('.form-booking-edit')).fadeIn();
		});
	});


});