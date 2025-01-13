<?php 
    include_once 'apis/MysqliDb.php';
    
    // Creating a new database connection
    $db = new MysqliDb(
        'video-database.mysql.database.azure.com', // Host
        'aminakhtar',                   // Username
        'Amin123@',                       // Password
        'assignment4'                   // Database name
    );
    
    // Debugging the database connection object
    var_dump($db);
?>
