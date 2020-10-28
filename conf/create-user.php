<?php
# Create a default admin user
include 'inc/global.inc.php';
include 'inc/classes/Sentinel.php';

Sentinel::init();
Sentinel::create();
$username = exec('echo $SYSLOG_USERNAME');
$password = exec('echo $SYSLOG_PASSWORD');

echo "Creating user with credentials: $username:$password\n";

Sentinel::setAdmin($username,$password);
Sentinel::save();

?>