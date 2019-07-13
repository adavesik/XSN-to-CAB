<?php
/* Setup a database connection with PDO */
$dbhost = "localhost";
$dbuser = "";
$dbpass = "";
$dbname = "";

// Set DSN
$dsn = 'mysql:host='.$dbhost.';dbname='.$dbname;

// Set options
$options = array(
    PDO::ATTR_PERSISTENT    => true,
    PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
);

try {
    $db = new PDO($dsn, $dbuser, $dbpass, $options);
}
catch(PDOException $e){
    die("Error!: " . $e->getMessage());
}
