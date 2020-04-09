<?php 

function get_booking($the_date, $from_time, $field_name){
    $sql = 'SELECT * FROM booking WHERE the_date=? AND from_time=? AND field_name=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error</div>');
    }
    mysqli_stmt_bind_param($stmt, "sss", $the_date, $from_time, $field_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_close($conn);
    return $result;
}
function get_booking_type_count($the_date, $from_time, $field_type){
    $sql = 'SELECT count(*) as booking_rows FROM booking WHERE the_date=? AND from_time=? AND field_type=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error</div>');
    }
    mysqli_stmt_bind_param($stmt, "sss", $the_date, $from_time, $field_type);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $booking_rows = 0;
    if($result->num_rows>0){
      while( $row = mysqli_fetch_assoc($result) ){
        $booking_rows = $row['booking_rows'];
      }
    }
    mysqli_close($conn);
    return $booking_rows;
}