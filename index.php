<?php

//Get the real ip address
function getRealIpAddr() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else {
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
$ip = getRealIpAddr();

/*
If already have ip, then to detect the host of ip
https://livtutor.com/wp-api/host.php?ip=0.0.0.0
replace 0.0.0.0 with your ip address

For e.g -->
[https://livtutor.com/wp-api/host.php?ip=8.8.8.8] returns hostname google

*/
//once host detected


//for single host
$ip_host = json_decode(file_get_contents('https://livtutor.com/wp-api/block.php?ip='.$ip.'&host=YOUR HOST NAME'), true);

//for multiple host
$ip_host = json_decode(file_get_contents('https://livtutor.com/wp-api/block.php?ip='.$ip.'&host=host1,host2,host3'), true);
if($ip_host['status'] == 'true') {
		die('You are blacklisted');
		exit;
	}
  
/*
For e.g. -->
[https://livtutor.com/wp-api/block.php?ip=0.0.0.0&host=google,iana]

return

{"status":"true","response":"0.0.0.0 belongs To iana."}

*/

?>
*/

?>
