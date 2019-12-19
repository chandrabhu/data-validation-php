<?php
//Infinite Execution Time -- If 'maximum execution time exceeded' happened.
set_time_limit(0)
//reporting errors in php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



function escape_data($data){
//Database Connection
global $dbc;
//Check Magic Quotes is On
if(get_magic_quotes_gpc())
$data = stripslashes($data);
return mysqli_real_escape_string(trim($data), $dbc);
}


$live = false;
$contact_email = 'you@example.com';

define ('BASE_URI', '/path/to/Web/parent/folder/');
define ('BASE_URL', 'www.example.com/');
define ('MYSQL', '/path/to/mysql.inc.php');
session_start( );

function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {

	global $live, $contact_email;
  
	$message = "An error occurred in script '$e_file' on line $e_line:\n$e_message\n";
	$message .= "<pre>" .print_r(debug_backtrace( ), 1) . "</pre>\n";
	$message .= "<pre>" . print_r ($e_vars, 1) . "</pre>\n";

	if (!$live) {
		echo '<div class="error">' . nl2br($message) . '</div>';
	} else {
		error_log ($message, 1, $contact_email, 'From:admin@example.com');
	}
  
	if ($e_number != E_NOTICE) {
		echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
	}
return true;
}

//All file head--Check .
set_error_handler ('my_error_handler');

?>
