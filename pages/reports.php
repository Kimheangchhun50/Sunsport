<?php 
	
	$report_type = isset($_GET['report'])?$_GET['report']:'daily';
	if( $report_type == 'yearly' ){
		$the_date = isset($_GET['date'])?(strtotime($_GET['date'])?date($_year_format, strtotime($_GET['date'])):date($_year_format, $_today_timestamp)):date($_year_format, $_today_timestamp);
		$reports = get_daily_reports($the_date);
	}
	else if( $report_type == 'monthly' ){
		$the_date = isset($_GET['date'])?(strtotime($_GET['date'])?date($_month_format, strtotime($_GET['date'])):date($_month_format, $_today_timestamp)):date($_month_format, $_today_timestamp);
		$reports = get_daily_reports($the_date);
	}
	else{
		$the_date = isset($_GET['date'])?(strtotime($_GET['date'])?date($_date_format, strtotime($_GET['date'])):$_today_date):$_today_date;
		$reports = get_daily_reports($the_date);
	}
 ?>

<?php //if( is_array($reports) && sizeof($reports)>0 ): ?>
<div class="page-container report">
	<div class="header">
		<h2 class="title">Reports</h2>
		<select name="report_type" id="report_type">
			<option value="daily" <?php echo $report_type == 'daily'?'selected':''; ?> >Daily</option>
			<option value="monthly" <?php echo $report_type == 'monthly'?'selected':''; ?> >Monthly</option>
			<option value="yearly" <?php echo $report_type == 'yearly'?'selected':''; ?> >Yearly</option>
		</select>
	</div>
	<?php 
		if( $report_type == 'yearly' ){
			include_once SITE_URI.'/templates/report-yearly.php';
		}
		else if( $report_type == 'monthly' ){
			include_once SITE_URI.'/templates/report-monthly.php';
		}
		else{
			include_once SITE_URI.'/templates/report-daily.php';
		}

	?>
</div>
<?php //endif; ?>