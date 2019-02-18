<?php

// ----------------------------------------------------------------------

// DEV ENV 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_booking');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// ----------------------------------------------------------------------

// PRODUCTION ENV

// if ($cleardb_url = parse_url(getenv("mysql://bfdd1a56855e29:1dc6a049@us-cdbr-iron-east-03.cleardb.net/heroku_a262583a747ea80?reconnect=true"))) {
//   $cleardb_server   = "us-cdbr-iron-east-03.cleardb.net";
//   $cleardb_username = "bfdd1a56855e29";
//   $cleardb_password = "1dc6a049";
//   $cleardb_db       = "heroku_a262583a747ea80";
// }

// mysql -u bfdd1a56855e29 -h us-cdbr-iron-east-03.cleardb.net -p 1dc6a049

// $active_group = 'default';
// $query_builder = TRUE;

// $db['default'] = array(
//     'dsn'    => '',
//     'hostname' => $cleardb_server,
//     'username' => $cleardb_username,
//     'password' => $cleardb_password,
//     'database' => $cleardb_db,
//     'dbdriver' => 'mysqli',
//     'dbprefix' => '',
//     'pconnect' => FALSE,
//     // 'db_debug' => (ENVIRONMENT !== 'production'),
//     'cache_on' => FALSE,
//     'cachedir' => '',
//     'char_set' => 'utf8',
//     'dbcollat' => 'utf8_general_ci',
//     'swap_pre' => '',
//     'encrypt' => FALSE,
//     'compress' => FALSE,
//     'stricton' => FALSE,
//     'failover' => array(),
//     'save_queries' => TRUE
// );

// $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if (!$conn){
  echo "error " . $conn->error;
}
?>