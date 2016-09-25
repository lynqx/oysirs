<?php
// set a time limit in seconds
$timelimit = 1440;
// get the current time
$now = time();
// where to redirect if rejected
$redirect = 'index.php';
// if session variable not set, redirect to login page
if (!isset($_SESSION['user_session'])) {
header("Location: $redirect");
exit;
}
// if timelimit has expired, destroy session and redirect
elseif ($now > $_SESSION['start'] + $timelimit) {
// empty the $_SESSION array
$_SESSION = array();
// invalidate the session cookie
//$_SESSION['SESS_USER_ID']
if (isset($_COOKIE['user_id'])) {
setcookie('user_id', '', time()-86400, '/');
}
// end session and redirect with query string
session_destroy();
header("Location: {$redirect}?expired=yes");
exit;
}
// if it's got this far, it's OK, so update start time
else {
$_SESSION['start'] = time();
}
?>

<?php // Flush the buffered output.
ob_end_flush();
?>