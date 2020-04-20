<?php 

  include_once SITE_URI.'/db.php';

  $today_timestamp = time();
  $today_date = date($date_format, $today_timestamp);
  $the_date = isset($_GET['date'])?(strtotime($_GET['date'])?date($date_format, strtotime($_GET['date'])):$today_date):$today_date;
  $fields = array(
    array( 'field_name' => 'A', 'field_type' => 'small' ),
    array( 'field_name' => 'B', 'field_type' => 'small' ),
    array( 'field_name' => 'C', 'field_type' => 'small' ),
    array( 'field_name' => 'D', 'field_type' => 'small' ),
    array( 'field_name' => 'E', 'field_type' => 'big' )
  );
  

  $conn = conn();
  $sql = 'SELECT min(from_time) as open_time, max(to_time) as close_time FROM pricing';
  $result = mysqli_query($conn, $sql);
  if($result->num_rows>0){
    while( $row = mysqli_fetch_assoc($result) ){
      $open_time = $row['open_time'];
      $close_time = $row['close_time'];
    }
  }
  mysqli_close($conn);

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
          <div class="price-table">
            <h3>Price Table</h3>
            <table border="1">
              <tr>
                <th>Time</th>
                <th>Price</th>
              </tr>
              <tr>
                <td>08:00-09:00 AM</td>
                <td>$5</td>
              </tr>
              <tr>
                <td>08:00-09:00 AM</td>
                <td>$5</td>
              </tr>
              <tr>
                <td>08:00-09:00 AM</td>
                <td>$5</td>
              </tr>
            </table>
          </div>
          <div class="logout">
            <a href="<?php echo SITE_URL; ?>/logout">Logout</a>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <th class="td255">
        <label name="date">Date:</label>
        <input type="date" value="<?php echo $the_date; ?>" id="the_date">
        <input type="hidden" value="<?php echo $the_date; ?>" id="date">
      </th>
      <th colspan="5">Fields</th>
    </tr>
    <tr>
      <th class="td255">Time</th>
      <?php foreach($fields as $field): ?>
      <th><div class="td-head"><?php echo $field['field_name']; ?></div></th> 
      <?php endforeach; ?> 
    </tr>
    <?php for( $i=strtotime($open_time); $i<strtotime($close_time); $i=$i+strtotime('+1 hour', strtotime($i)) ): ?>
    <tr>
      <td class="td-time td255"><?php echo date($time_format, $i); ?> - <?php echo date($time_format, strtotime('+1 hour',$i)); ?></td>
      <?php 
        $disable_big = false; $disable_small = false;
        $from_time = date($time_format_24, $i);
        $booking_small = get_booking_type_count($the_date, $from_time, 'small');
        $booking_big = get_booking_type_count($the_date, $from_time, 'big');
        if( $booking_small > 0 ){
          $disable_big = true;
        }
        else if( $booking_big > 0 ){
          $disable_small = true;
        }
      ?>
      <?php foreach($fields as $field): ?>
      <td class="td-block">
        <?php 
          $from_time = date($time_format_24, $i);
          $field_name = $field['field_name'];
          $result = get_booking($the_date, $from_time, $field_name); 
        ?>
        <?php if($result->num_rows>0): ?>
          <?php while( $row = mysqli_fetch_assoc($result) ): ?>
            <?php 
              
            ?>
            <div class="booking" data-id="<?php echo $row['id']; ?>">
              <h2 class="text"><?php echo $row['c_name']; ?></h2>
              <h4 class="sub-text"><?php echo $row['c_phone']; ?></h4>
            </div>
          <?php endwhile; ?>
        <?php else: $disable = false; ?>
          <?php if( ($field['field_type']=='small') ): ?>
            <?php if($disable_small): ?>
              <div class="disabled">Not available!</div>
            <?php else: ?>
              <button class="button add-booking" data-time="<?php echo date('H', $i); ?>" data-field="<?php echo $field['field_name']; ?>" > + </button>
            <?php endif; ?>
          <?php else: ?>
            <?php if($disable_big): ?>
              <div class="disabled">Not available!</div>
            <?php else: ?>
              <button class="button add-booking" data-time="<?php echo date('H', $i); ?>" data-field="<?php echo $field['field_name']; ?>" > + </button>
            <?php endif; ?>
          <?php endif; ?>
          
        <?php endif; ?>
      </td>
      <?php endforeach; ?> 
    </tr>
   <?php endfor; ?>

  </table>
</div>