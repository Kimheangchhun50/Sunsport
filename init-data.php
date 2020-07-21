<?php 

  $_today_timestamp = time() + 60*60*5;
  $_today_date = date($_date_format, $_today_timestamp);
  $_fields = get_fields();
  $_pricings = get_pricings();
  

  $conn = conn();
  $sql = 'SELECT min(from_time) as open_time, max(to_time) as _close_time FROM pricing';
  $result = mysqli_query($conn, $sql);
  if($result->num_rows>0){
    while( $row = mysqli_fetch_assoc($result) ){
      $_open_time = $row['open_time'];
      $_close_time = $row['_close_time'];
    }
  }
  mysqli_close($conn);

