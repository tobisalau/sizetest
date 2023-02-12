<?php

session_start();

function errHan($error) {
    if (empty($firstErr)) {
        $firstErr = $error;
    }
}

function vali_input($info) {
    $info = trim($info);
    $info = stripslashes($info);
    $info = htmlspecialchars($info);
    return $info;
}

if (isset($_POST["submit"])) {
    $uname = $pword = "";
    $firstErr = "";
    
    if (empty($_POST["name"])) {
        errHan("Please enter a username");
        header("location: https://sizetest.azurewebsites.net/index.php?error=emptyname");
        exit;
    }
    else {
        $uname = vali_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9_]*$/",$uname)) {
            errHan("Only letters, number and underscores are allowed in usernames");
            header("location: https://sizetest.azurewebsites.net/index.php?error=Invalid-Username");
        exit;
        }
    }
    
    if (empty($_POST["pwrd"])) {
        errHan("Please enter a password");
        header("location: https://sizetest.azurewebsites.net/index.php?error=emptypassword");
        exit;
    }
    else {
        $pword = vali_input($_POST["pwrd"]);;
    }
   
   
    // $connection = obdc_connect('DRIVER={ODBC Driver 18 for SQL Server};Server=tcp:sizeserver2.database.windows.net,1433;DATABASE=sizedb5;UID=ooas3;PWD=Password22!!;CONNECTION TIMEOUT=30;');
}



/* 
    $serverName = "sizeserver2.database.windows.net"; 
    $connectionOptions = array(
        "Database" => "sizedb5", 
        "Uid" => "ooas3", 
        "PWD" => "Password22!!" 
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT brandname FROM Brands WHERE b_id == 1";
    $getResults= sqlsrv_query($conn, $tsql);
    echo $getResults
    /* if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['CategoryName'] . " " . $row['ProductName'] . PHP_EOL);
    }
    sqlsrv_free_stmt($ getResults); */

?>
    
