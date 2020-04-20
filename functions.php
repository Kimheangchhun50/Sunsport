<?php 

function get_bookings($the_date, $from_time, $field_name){
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

function get_booking_count($the_date, $from_time, $field_name){
    $sql = 'SELECT count(*) as booking_rows FROM booking WHERE the_date=? AND from_time=? AND field_name=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error</div>');
    }
    mysqli_stmt_bind_param($stmt, "sss", $the_date, $from_time, $field_name);
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

function get_fields(){
    $sql = 'SELECT DISTINCT(field_name), field_type, field_group FROM pricing';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error</div>');
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_close($conn);
    if($result->num_rows<=0) return array();
    $r = array();
    while( $row = mysqli_fetch_assoc($result) ){
        array_push($r, 
            array(
                'field_name' => $row['field_name'],
                'field_type' => $row['field_type'],
                'field_group' => $row['field_group']
            )
        );
    }
    return $r;
}

function get_pricings(){
    $sql = 'SELECT * FROM pricing';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error</div>');
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_close($conn);
    if($result->num_rows<=0) return array();
    $r = array();
    while( $row = mysqli_fetch_assoc($result) ){
        array_push($r, 
            $row
        );
    }
    return $r;
}

function get_price($field_name, $time){
    $sql = 'SELECT price FROM pricing WHERE field_name=? AND (? >= from_time AND ? < to_time)';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error</div>');
    }
    mysqli_stmt_bind_param($stmt, "sss", $field_name, $time, $time);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    // var_dump($result);
    mysqli_close($conn);
    if($result->num_rows<=0) return 0;
    $r = 0;
    while( $row = mysqli_fetch_assoc($result) ){
        $r = $row['price'];
    }
    return $r;
}

function add_booking( $data = array() ){
    if( !isset($data['c_name']) || !isset($data['c_phone']) || !isset($data['the_date']) || !isset($data['from_time']) || !isset($data['to_time']) || !isset($data['field_name']) || !isset($data['field_type']) || !isset($data['field_group']) || !isset($data['price']) ){
        return false;
    }
    if( empty($data['c_name']) || empty($data['c_phone']) || empty($data['the_date']) || empty($data['from_time']) || empty($data['to_time']) || empty($data['field_name']) || empty($data['field_type']) || empty($data['field_group']) || empty($data['price']) ){
        return false;
    }

    $sql = "INSERT INTO booking(c_name, c_phone, the_date, from_time, to_time, field_name, field_type, field_group, price, remark) value(?,?,?,?,?,?,?,?,?,?)";
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error</div>');
    }
    mysqli_stmt_bind_param($stmt, "ssssssssis", $data['c_name'], $data['c_phone'], $data['the_date'], $data['from_time'], $data['to_time'], $data['field_name'], $data['field_type'], $data['field_group'], intval($data['price']), $data['remark']);
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}

function get_booking($id){
    if( intval($id) <=0 ) return false;
    $sql = 'SELECT * FROM booking WHERE id=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error</div>');
    }
    mysqli_stmt_bind_param($stmt, "i", intval($id));
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_close($conn);
    if($result->num_rows<=0) return false;
    $r = false;
    while( $row = mysqli_fetch_assoc($result) ){
        $r = $row;
    }
    return $r;
}

function isAdmin($id){
    $sql = 'SELECT role FROM users WHERE id=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error</div>');
    }
    mysqli_stmt_bind_param($stmt, "i", intval($id));
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_close($conn);
    if($result->num_rows>0){
        $r = '';
        while( $row = mysqli_fetch_assoc($result) ){
            $r = $row['role'];
        }
        if( $r == 'admin') return true;
    }
    return false;
}