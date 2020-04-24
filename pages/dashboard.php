<?php 

  $the_date = isset($_GET['date'])?(strtotime($_GET['date'])?date($_date_format, strtotime($_GET['date'])):$_today_date):$_today_date;

?>
<div id="dashboard" class="dashboard">
  <table border="1">
    <tr>
      <td rowspan="0" style="vertical-align: top; min-width: 255px;">
        <div class="side">
          <div class="logo">
            <img src="" alt="">
            <h2>Sun Sport</h2>
          </div>
          <?php if( is_array($_pricingS) && sizeof($_pricingS)>0 ): ?>
          <div class="price-table">
            <h3>Price Table</h3>
            <table border="1">
              <tr>
                <th>Field</th>
                <th>Time</th>
                <th>Price</th>
              </tr>
              <?php foreach( $_pricingS as $price_table ): ?>
              <tr>
                <td><?php echo $price_table['field_name'].'('.$price_table['field_type'].')'; ?></td>
                <td><?php echo date($_time_format, strtotime($price_table['from_time'])).' - '.date($_time_format, strtotime($price_table['to_time'])); ?></td>
                <td>$<?php echo $price_table['price']; ?></td>
              </tr>
              <?php endforeach; ?>

            </table>
          </div>
          <?php endif; ?>
          <div class="logout">
            <a href="<?php echo SITE_URL; ?>/logout">Logout</a>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <th class="td255">
        <div class="nav">
          <label name="date">Date:</label>
          <input type="date" value="<?php echo $the_date; ?>" id="the_date">
          <input type="hidden" value="<?php echo $the_date; ?>" id="date">
          <a class="link" href="<?php echo $current_url.'?date='.date('Y-m-d', strtotime('-1 day', strtotime($the_date))); ?>"><</a>
          <a class="link" href="<?php echo $current_url.'?date='.date('Y-m-d', strtotime('+1 day', strtotime($the_date))); ?>">></a>
        </div>
      </th>
      <th colspan="5">Fields</th>
    </tr>
    <tr>
      <th class="td255">Time</th>
      <?php foreach($_fields as $field): ?>
      <th><div class="td-head"><?php echo $field['field_name']; ?></div></th> 
      <?php endforeach; ?> 
    </tr>
    <?php for( $i=strtotime($the_date.' '.$_open_time); $i<strtotime($the_date.' '.$_close_time); $i=$i+strtotime('+1 hour', strtotime($i)) ): ?>
    <tr>
      <td class="td-time td255"><?php echo date($_time_format, $i); ?> - <?php echo date($_time_format, strtotime('+1 hour',$i)); ?></td>
      <?php 
        $disable_big = false; $disable_small = false;
        $from_time = date($_time_format_24, $i);
        $booking_small = get_booking_type_count($the_date, $from_time, 'small');
        $booking_big = get_booking_type_count($the_date, $from_time, 'big');
        if( $booking_small > 0 ){
          $disable_big = true;
        }
        else if( $booking_big > 0 ){
          $disable_small = true;
        }
      ?>
      <?php foreach($_fields as $field): ?>
      <td class="td-block">
        <?php 
          $from_time = date($_time_format_24, $i);
          $field_name = $field['field_name'];
          $result = get_bookings($the_date, $from_time, $field_name); 
        ?>
        <?php if($result->num_rows>0): ?>
          <?php while( $row = mysqli_fetch_assoc($result) ): ?>
            <?php 
              
            ?>
            <div class="booking edit-booking" data-id="<?php echo $row['id']; ?>">
              <h2 class="text"><?php echo $row['c_name']; ?></h2>
              <h4 class="sub-text"><?php echo $row['c_phone']; ?></h4>
            </div>
          <?php endwhile; ?>
        <?php else: $disable = false; ?>
          <?php if( ($field['field_type']=='small') ): ?>
            <?php if($disable_small): ?>
              <div class="disabled">Not available!</div>
            <?php else: ?>
              <button class="button add-booking" data-time="<?php echo date('H', $i); ?>" data-field="<?php echo $field['field_name']; ?>" data-price="<?php  echo get_price($field['field_name'], date($_time_format_24, $i)); ?>" <?php //if($_today_timestamp>$i) echo 'disabled'; ?>   > + </button>
            <?php endif; ?>
          <?php else: ?>
            <?php if($disable_big): ?>
              <div class="disabled">Not available!</div>
            <?php else: ?>
              <button class="button add-booking" data-time="<?php echo date('H', $i); ?>" data-field="<?php echo $field['field_name']; ?>" data-price="<?php  echo get_price($field['field_name'], date($_time_format_24, $i)); ?>" <?php //if($_today_timestamp>$i) echo 'disabled'; ?>   > + </button>
            <?php endif; ?>
          <?php endif; ?>
          
        <?php endif; ?>
      </td>
      <?php endforeach; ?> 
    </tr>
   <?php endfor; ?>

  </table>
</div>

<?php if( isset($_SESSION['status']) ): ?>
<div class="response" style="<?php echo isset($_SESSION['status'])?(intval($_SESSION['status'])==0?'background:red;':''):''; ?>">
  <h3 class="title"><?php echo isset($_SESSION['status'])?(intval($_SESSION['status'])==0?'Failed!':'Successful!'):'' ?></h3>
  <p class="message">
    <?php echo isset($_SESSION['message'])?$_SESSION['message']:'Please report to your administrator?' ?>
  </p>
  <button class="btn btn-close-response">X</button>
</div>
<?php 
  $_SESSION['status'] = null;
  $_SESSION['message'] = null;
?>
<?php endif; ?>

<div id="view"></div>