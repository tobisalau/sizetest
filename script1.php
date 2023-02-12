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
    
    if (empty($_POST["username"])) {
        errHan("Please enter a username");
        header("Location: failsign.php?error=emptyname");
        exit;
    }
    else {
        $uname = vali_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9_]*$/",$uname)) {
            errHan("Only letters, number and underscores are allowed in usernames");
            header("Location: failsign.php?error=Invalid-Username");
        exit;
        }
    }
    
    if (empty($_POST["pwrd"])) {
        errHan("Please enter a password");
        header("Location: failsign.php?error=emptypassword");
        exit;
    }
    else {
        $pword = vali_input($_POST["pwrd"]);;
    }
    $serverName = "sizeserver2.database.windows.net"; 
    $connectionOptions = array(
        "Database" => "sizedb5", 
        "Uid" => "ooas3", 
        "PWD" => "Password22!!" 
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT pword FROM Users WHERE username == " . $uname;
    $getResults= sqlsrv_query($conn, $tsql);
    if (hash('md5',$getResults) == hasg('md5',$pword)) {
        header("Location: index.php?error=success");
        exit;
   
    }
   
    // $connection = obdc_connect('DRIVER={ODBC Driver 18 for SQL Server};Server=tcp:sizeserver2.database.windows.net,1433;DATABASE=sizedb5;UID=ooas3;PWD=Password22!!;CONNECTION TIMEOUT=30;');
}



/* 
    

?>
    
