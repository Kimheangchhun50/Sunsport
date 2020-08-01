<?php 

function get_bookings($the_date, $from_time, $field_name){
    $sql = 'SELECT * FROM booking WHERE the_date=? AND from_time=? AND field_name=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "sss", $the_date, $from_time, $field_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_close($conn);
    return $result;
}
function get_booking_type_count($the_date, $from_time, $field_type, $id_out=0){
    $sql = 'SELECT count(*) as booking_rows FROM booking WHERE the_date=? AND from_time=? AND field_type=? AND id<>?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "sssi", $the_date, $from_time, $field_type, $id_out);
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
function get_booking_count($the_date, $from_time, $field_name, $id_out=0){
    $sql = 'SELECT count(*) as booking_rows FROM booking WHERE the_date=? AND from_time=? AND field_name=? AND id<>?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "sssi", $the_date, $from_time, $field_name, $id_out);
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
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
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
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
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
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
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
function edit_price( $id, $price ){
    if( $id<=0 || $price<=0 || empty($id) || empty($price) ){
        return false;
    }

    $sql = "UPDATE pricing SET price=? WHERE id=?";
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "di", $price, $id );
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
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
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "ssssssssis", $data['c_name'], $data['c_phone'], $data['the_date'], $data['from_time'], $data['to_time'], $data['field_name'], $data['field_type'], $data['field_group'], intval($data['price']), $data['remark']);
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}

function edit_booking( $data = array() ){
    if( !isset($data['c_name']) || !isset($data['c_phone']) || !isset($data['the_date']) || !isset($data['from_time']) || !isset($data['to_time']) || !isset($data['field_name']) || !isset($data['field_type']) || !isset($data['field_group']) || !isset($data['price']) || !isset($data['id']) ){
        return false;
    }
    if( empty($data['c_name']) || empty($data['c_phone']) || empty($data['the_date']) || empty($data['from_time']) || empty($data['to_time']) || empty($data['field_name']) || empty($data['field_type']) || empty($data['field_group']) || empty($data['price']) || empty($data['id']) ){
        return false;
    }

    $sql = "UPDATE booking SET c_name=?, c_phone=?, the_date=?, from_time=?, to_time=?, field_name=?, field_type=?, field_group=?, price=?, remark=? WHERE id=?";
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "ssssssssisi", $data['c_name'], $data['c_phone'], $data['the_date'], $data['from_time'], $data['to_time'], $data['field_name'], $data['field_type'], $data['field_group'], intval($data['price']), $data['remark'], $data['id']);
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}
function delete_booking( $id){
    if($id<=0) return false;
    $sql = 'DELETE FROM booking WHERE id=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    $r = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $r;
}

function get_booking($id){
    if( intval($id) <=0 ) return false;
    $sql = 'SELECT * FROM booking WHERE id=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
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
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
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

function get_daily_reports($the_date){
    $conn = conn();
    $sql = 'SELECT *, (price+IFNULL(water, 0)+IFNULL(extra, 0)) as amount FROM booking WHERE the_date=?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "s", $the_date);
    mysqli_stmt_execute($stmt);
    $r_bookings = mysqli_stmt_get_result($stmt);



    mysqli_close($conn);
    $r = array(
        'bookings' => array()
    );
    $r_s = get_daily_reports_summary($the_date);
    if($r_bookings->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_bookings) ){
            array_push($r['bookings'], $row);
        }
    }
    $rr = array_merge($r, $r_s);
    return $rr;
}

function get_daily_reports_summary($the_date){
    $conn = conn();

    $sql = 'SELECT count(*) as the_rows FROM booking WHERE the_date=?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "s", $the_date);
    mysqli_stmt_execute($stmt);
    $r_total_booking = mysqli_stmt_get_result($stmt);

    $sql = 'SELECT sum((price+IFNULL(water, 0)+IFNULL(extra, 0))) as the_rows FROM booking WHERE the_date=?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "s", $the_date);
    mysqli_stmt_execute($stmt);
    $r_total_amount = mysqli_stmt_get_result($stmt);

    $sql = 'SELECT count(*) as the_rows FROM booking WHERE the_date=? AND status=?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    $status = 'cancel';
    mysqli_stmt_bind_param($stmt, "ss", $the_date, $status);
    mysqli_stmt_execute($stmt);
    $r_total_cancel = mysqli_stmt_get_result($stmt);

    mysqli_close($conn);
    $r = array(
        'the_date' => $the_date,
        'total_booking' => 0,
        'total_amount' => 0,
        'total_cancel' => 0
    );

    if($r_total_booking->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_total_booking) ){
            $r['total_booking'] = intval($row['the_rows']);
        }
    }
    if($r_total_amount->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_total_amount) ){
            $r['total_amount'] = intval($row['the_rows']);
        }
    }
    if($r_total_cancel->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_total_cancel) ){
            $r['total_cancel'] = intval($row['the_rows']);
        }
    }
    return $r;
}

function get_monthly_reports($the_month){
    $r = array();
    for( $loop=strtotime($the_month.'-01'); $loop<strtotime('+1 month', strtotime($the_month.'-01')); $loop=strtotime('+1 day', $loop) ){
        $rr = get_daily_reports_summary( date('Y-m-d', $loop) );
        array_push($r, $rr);
    }
    $r_s = get_monthly_reports_summary($the_month);
    $rrr = array(
        'reports' => $r, 
        'summary' => $r_s
    );
    return $rrr;
}
function get_monthly_reports_summary($the_month){
    $conn = conn();
    $the_date_start = $the_month.'-01';
    $the_date_end = date('Y-m-d', strtotime('+1 month', strtotime($the_month.'-01')));

    $sql = 'SELECT count(*) as the_rows FROM booking WHERE the_date>=? AND the_date<?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "ss", $the_date_start, $the_date_end);
    mysqli_stmt_execute($stmt);
    $r_total_booking = mysqli_stmt_get_result($stmt);

    $sql = 'SELECT sum((price+IFNULL(water, 0)+IFNULL(extra, 0))) as the_rows FROM booking WHERE the_date>=? AND the_date<?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "ss", $the_date_start, $the_date_end);
    mysqli_stmt_execute($stmt);
    $r_total_amount = mysqli_stmt_get_result($stmt);

    $sql = 'SELECT count(*) as the_rows FROM booking WHERE the_date>=? AND the_date<? AND status=?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    $status = 'cancel';
    mysqli_stmt_bind_param($stmt, "sss", $the_date_start, $the_date_end, $status);
    mysqli_stmt_execute($stmt);
    $r_total_cancel = mysqli_stmt_get_result($stmt);

    mysqli_close($conn);
    $r = array(
        'the_date' => $the_date_start,
        'total_booking' => 0,
        'total_amount' => 0,
        'total_cancel' => 0
    );

    if($r_total_booking->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_total_booking) ){
            $r['total_booking'] = intval($row['the_rows']);
        }
    }
    if($r_total_amount->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_total_amount) ){
            $r['total_amount'] = intval($row['the_rows']);
        }
    }
    if($r_total_cancel->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_total_cancel) ){
            $r['total_cancel'] = intval($row['the_rows']);
        }
    }
    return $r;
}

function get_yearly_reports($the_year){
    $r = array();
    for( $loop=1; $loop<=12; $loop++ ){
        $rr = get_monthly_reports_summary( $the_year.'-'.$loop );
        array_push($r, $rr);
    }
    $r_s = get_yearly_reports_summary($the_year);
    $rrr = array(
        'reports' => $r, 
        'summary' => $r_s
    );
    return $rrr;
}
function get_yearly_reports_summary($the_year){
    $conn = conn();
    $the_date_start = $the_year.'-01-01';
    $the_date_end = date('Y-m-d', strtotime('+1 year', strtotime($the_year.'-01-01')));

    $sql = 'SELECT count(*) as the_rows FROM booking WHERE the_date>=? AND the_date<?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "ss", $the_date_start, $the_date_end);
    mysqli_stmt_execute($stmt);
    $r_total_booking = mysqli_stmt_get_result($stmt);

    $sql = 'SELECT sum((price+IFNULL(water, 0)+IFNULL(extra, 0))) as the_rows FROM booking WHERE the_date>=? AND the_date<?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "ss", $the_date_start, $the_date_end);
    mysqli_stmt_execute($stmt);
    $r_total_amount = mysqli_stmt_get_result($stmt);

    $sql = 'SELECT count(*) as the_rows FROM booking WHERE the_date>=? AND the_date<? AND status=?';
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    $status = 'cancel';
    mysqli_stmt_bind_param($stmt, "sss", $the_date_start, $the_date_end, $status);
    mysqli_stmt_execute($stmt);
    $r_total_cancel = mysqli_stmt_get_result($stmt);

    mysqli_close($conn);
    $r = array(
        'the_date' => $the_date_start,
        'total_booking' => 0,
        'total_amount' => 0,
        'total_cancel' => 0
    );

    if($r_total_booking->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_total_booking) ){
            $r['total_booking'] = intval($row['the_rows']);
        }
    }
    if($r_total_amount->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_total_amount) ){
            $r['total_amount'] = intval($row['the_rows']);
        }
    }
    if($r_total_cancel->num_rows>0){
        while( $row = mysqli_fetch_assoc($r_total_cancel) ){
            $r['total_cancel'] = intval($row['the_rows']);
        }
    }
    return $r;
}
//=============================================================================================================
// users
function get_users(){
    $sql = 'SELECT * FROM users';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_close($conn);
    if($result->num_rows<=0) return array();
    $r = array();
    while( $row = mysqli_fetch_assoc($result) ){
        array_push($r, $row);
    }
    return $r;
}
function get_user($id=0){
    $sql = 'SELECT * FROM users WHERE id=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    mysqli_close($conn);
    if($result->num_rows<=0) return array();
    $r = array();
    while( $row = mysqli_fetch_assoc($result) ){
        $r = $row;
    }
    return $r;
}
function username_existed($username=''){
    $sql = 'SELECT count(*) as the_rows FROM users WHERE username=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $the_rows = 0;
    if($result->num_rows>0){
      while( $row = mysqli_fetch_assoc($result) ){
        $the_rows = $row['the_rows'];
      }
    }
    mysqli_close($conn);
    return $the_rows;
}
function add_user( $data = array() ){
    if( !isset($data['the_name']) || !isset($data['the_role']) || !isset($data['the_username']) || !isset($data['the_password']) ){
        return false;
    }
    if( empty($data['the_name']) || empty($data['the_role']) || empty($data['the_username']) || empty($data['the_password']) ){
        return false;
    }

    $sql = "INSERT INTO users(name, role, username, password) value(?,?,?,?)";
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "ssss", $data['the_name'], $data['the_role'], $data['the_username'], $data['the_password'] );
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}
function edit_user($data){
    if( !isset($data['the_name']) || !isset($data['the_role']) || !isset($data['the_id']) ){
        return false;
    }
    if( empty($data['the_name']) || empty($data['the_role']) || empty($data['the_id']) ){
        return false;
    }

    $sql = "UPDATE users SET name=?, role=? WHERE id=?";
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "ssi", $data['the_name'], $data['the_role'], $data['the_id'] );
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}
function delete_user($id=0){
    if($id<=0) return false;
    $sql = 'DELETE FROM users WHERE id=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    $r = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $r;
}
//=============================================================================================================

function generate_billing_number(){
    $sql = 'SELECT IFNULL(max(billing_number), 0) as the_row FROM billing';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $the_row = 0;
    if($result->num_rows>0){
      while( $row = mysqli_fetch_assoc($result) ){
        $the_row = $row['the_row'];
      }
    }
    mysqli_close($conn);
    return intval($the_row) + 1;
}
// var_dump(generate_billing_number());
function submit_billing( $data = array() ){
    if( !isset($data['booking_id']) || !isset($data['billing_number']) || !isset($data['price']) || !isset($data['user_id']) ){
        return false;
    }
    if( empty($data['booking_id']) || empty($data['billing_number']) || empty($data['price']) || empty($data['user_id']) ){
        return false;
    }

    $sql = "INSERT INTO billing(booking_id, billing_number, price, water, extra, user_id) value(?,?,?,?,?,?);";
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "iiiiii", $data['booking_id'], $data['billing_number'], $data['price'], $data['water'], $data['extra'], $data['user_id']);
    $result = mysqli_stmt_execute($stmt);
    $id =  mysqli_insert_id($conn);    
    mysqli_close($conn);
    return $id;
}

function billing_exist($booking_id){
    $sql = 'SELECT count(*) as the_row FROM billing WHERE booking_id=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
    }
    mysqli_stmt_bind_param($stmt, "i", $booking_id); 
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $the_row = 0;
    if($result->num_rows>0){
      while( $row = mysqli_fetch_assoc($result) ){
        $the_row = intval($row['the_row']);
      }
    }
    if($the_row>0) return true;
    mysqli_close($conn);
    return false;
}

function get_booking_billing($id){
    if( intval($id) <=0 ) return false;
    $sql = 'SELECT * FROM booking INNER JOIN billing ON `booking`.`id`=`billing`.`booking_id` WHERE `booking`.`id`=?';
    $conn = conn();
    $stmt = mysqli_stmt_init($conn);
    if( !mysqli_stmt_prepare($stmt, $sql) ){
      die('<div class="error">SQL error: '.mysqli_error($conn).'</div>');
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