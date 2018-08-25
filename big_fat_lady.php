// Notify when IP visits frontend

function big_fat_lady() {
  if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
	    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	  	$ip = $_SERVER['REMOTE_ADDR'];
	}
	
	if ( ! empty( $ip ) && ( $ip = "123.123.123.123" ) {
		//curl blah	
	}
}

add_action('wp', 'big_fat_lady');
