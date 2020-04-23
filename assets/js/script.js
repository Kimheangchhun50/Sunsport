jQuery(document).ready(function($){
	// Dashboard Date change
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
	// Edit booking
	$('.dashboard').on('click', '.edit-booking', function(){
		var self = this;
		var id = $(self).attr('data-id');
		var link = SITE_URL+'/edit-booking/?id='+id+' #form-booking-edit';
		console.log(link);
		$('#view').load(link, function(){
			$($(this).find('.form-booking-edit')).fadeIn();
		});
	});

	// Report type change
	$('.report').on('change', '#report_type', function(){
		window.location.href = window.location.origin+window.location.pathname+'?report='+$(this).val();
	});

	$('.report-dialy').on('change', '#the_date', function(){
		window.location.href = window.location.origin+window.location.pathname+'?report=daily&date='+$(this).val();
	});
	$('.report-monthly').on('change', '#the_date', function(){
		window.location.href = window.location.origin+window.location.pathname+'?report=monthly&date='+$(this).val();
	});

	$('.report-yearly #the_date').datepicker({dateFormat: 'Y', changeYear: true});
	// $('.report-yearly').on('change', '#the_date', function(){
	// 	// window.location.href = window.location.origin+window.location.pathname+'?report=yearly&date='+$(this).val();
	// 	$(this).datepicker( "option", "Y", $( this ).val() );
	// });


});