<?php

$db_type = 'mysql';
if (getenv('IS_LOCAL')) {
    $servername = $_ENV['MYSQL_LOCALSERVER'];
    }
else {
    $servername = 'langprize.library.ucdavis.edu';
}
$dbname = $_ENV['MYSQL_DATABASE'];
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];


// make connection
include('/var/www/include/langprize_mysqli.inc.php');


?>
