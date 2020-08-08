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
	setTimeout(function(){
		$('.response').remove();
	}, 3000);

	// Add new booking
	// $('.dashboard').on('click', '.add-booking', function(){
	// 	var the_date = $('#the_date').val();
	// 	var the_time = $(this).attr('data-time');
	// 	var the_field = $(this).attr('data-field');
	// 	var the_price = $(this).attr('data-price');
	// 	$('.form-booking-new').fadeIn();
	// 	$($('.form-booking-new').find('[name=the_date]')[0]).val(the_date);
	// 	$($('.form-booking-new').find('[name=the_time]')[0]).val(the_time);
	// 	$($('.form-booking-new').find('[name=the_field]')[0]).val(the_field);
	// 	$($('.form-booking-new').find('[name=the_price]')[0]).val(the_price);
	// });
	// New booking
	$('.dashboard').on('click', '.add-booking', function(){
		var the_date = $('#the_date').val();
		var the_time = $(this).attr('data-time');
		var the_field = $(this).attr('data-field');
		var the_price = $(this).attr('data-price');
		var date=$('#the_date').val();
		var link = SITE_URL+'/add-booking/?date='+date+'&the_date='+the_date+'&the_time='+the_time+'&the_field='+the_field+'&the_price='+the_price+' #form-booking-new';
		// console.log(link);
		$('#view').load(link, function(){
			$($(this).find('.form-booking-new')).fadeIn();
		});
	});
	// Edit booking
	$('.dashboard').on('click', '.edit-booking', function(){
		var self = this;
		var id = $(self).attr('data-id');
		var date=$('#the_date').val();
		var link = SITE_URL+'/edit-booking/?id='+id+'&date='+date+' #form-booking-edit';
		link = link.replace(/\s/g, '%20');
		$('#view').load(link, function(){
			$($(this).find('.form-booking-edit')).fadeIn();
		});
	});
	// submit Edit booking
	$('#view').on('change', '.form-control', function(){
		var id = $('#view #booking_edit_id').val();
		var the_name = $('[name=the_name]').val();
		var the_phone = $('[name=the_phone]').val();
		var the_date = $('[name=the_date]').val();
		var the_field = $('[name=the_field]').val();
		var the_time = $('[name=the_time]').val();
		var the_remark = $('[name=the_remark]').val();
		var date=$('#the_date').val();

		var link = SITE_URL+'/submit-booking-edit/?id='+id+'&date='+date+'&the_name='+the_name+'&the_phone='+the_phone+'&the_date='+the_date+'&the_field='+the_field+'&the_time='+the_time+'&the_remark='+the_remark.trim()+'';
		link = link.replace(/\s/g, '%20');
		$('#view #booking_save').attr('href', link);
	});
	// Form field
	$('#view').on('change', '.form-booking .form [name="the_field"], .form-booking .form [name="the_time"]', function(){
		var field = $('.form-booking .form [name="the_field"] option:selected').val();
		var time = $('.form-booking .form [name="the_time"] option:selected').val();
		var price = $('.dashboard .td-block[data-time="'+time+'"][data-field="'+field+'"]');
		if(price.length>0){
			$('.form-booking .form [name="the_price"]').val($(price[0]).attr('data-price'));
		}
	});


	// Billing
	$('.billing-update').on('change', function(){
		var total = Number($('#billing-price').val()) + Number($('#billing-water').val()) + Number($('#billing-extra').val());
		$('#billing-total').text(total);
	});

	// $('.main').on('click', '#booking_checkout', function(){
	// 	var self = this;
	// 	var id = $(self).attr('data-id');
	// 	var link = SITE_URL+'/billing/?id='+id+' #form-billing';

	// 	$('#view').load(link, function(){
	// 		$($(this).find('.form-booking-edit')).fadeIn();
	// 	});
	// });


	// Expenses
	$('#btn-add-expenses').on('click', function(){
		$('.expenses #view').show();
		$('.expenses #view form').attr('action', SITE_URL+'/submit-form-expenses');
		$('.expenses #view [name="the_date"]').val($('[name="today_date"]').val());
		$('.expenses #view [name="the_item"]').val('');
		$('.expenses #view [name="the_price"]').val('');
		$('.expenses #view [name="the_qty"]').val('');
	});
	$('.expenses #view').on('click', '.close', function(){
		$('.expenses #view').hide();
	});
	$('.expenses .edit-expenses').on('click', function(){
		var id = $(this).attr('data-id');
		var link = SITE_URL+'/expenses?id='+id+' #form-expenses';
		$('#view').load(link, function(){
			$(this).show();
		});
	});
	$('.expenses .delete-expenses').on('click', function(){
		var id = $(this).attr('data-id');
		var action = SITE_URL+'/submit-form-expenses-delete';
		$('#confirm-delete').show();
		$('#confirm-delete [name="id"]').val(id);
		$('#confirm-delete form').attr('action', action);
	});
	$('.expenses #expenses-date').on('change', function(){
		window.location.href = window.location.origin+window.location.pathname+'?date='+$(this).val();
	});
	$('#confirm-delete').on('click', '.close', function(){
		$('#confirm-delete').hide();
		$('#confirm-delete [name="id"]').val('');
		$('#confirm-delete form').attr('action', '#');
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

	$('.report-yearly').on('change', '#the_date', function(){
		window.location.href = window.location.origin+window.location.pathname+'?report=yearly&date='+$(this).val();
	});


});