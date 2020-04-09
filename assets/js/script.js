jQuery(document).ready(function($){
	
	$('.dashboard').on('change', '#the_date', function(){
		window.location.href = window.location.origin+window.location.pathname+'?date='+$(this).val();
	});

	$('.dashboard').on('click', '.add-booking', function(){
		var the_date = $('#the_date').val();
		var the_time = $(this).attr('data-time');
		var the_field = $(this).attr('data-field');
		$('.form-booking-new').fadeIn();
		$($('.form-booking-new').find('[name=the_date]')[0]).val(the_date);
		$($('.form-booking-new').find('[name=the_time]')[0]).val(the_time);
		$($('.form-booking-new').find('[name=the_field]')[0]).val(the_field);
	});

	$('.form-booking').on('click', '.cancel', function(){
		$('.form-booking').fadeOut();
	});

});