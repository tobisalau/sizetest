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
   
    try {
    $uname = vali_input($_POST["username"]);
    $pword = vali_input($_POST["pwrd"]);
    $conn = new PDO("sqlsrv:server = tcp:sizeserver2.database.windows.net,1433; Database = sizedb5", "ooas3", "Password22!!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tl = "SELECT pword FROM Users WHERE username = '$uname'";
    $tsql = $conn->query($tl);
    $rows = $tsql->fetchAll();
    if (!empty($rows)) {
        $hash = hash('md5', $rows[0]['pword']);
        if ($hash == hash('md5', $pword)) {
            header("Location: index.php?error=success");
            exit;
        } else {
            header("Location: login.php?error=invalid");
            exit;
        }
    } else {
        header("Location: login.php?error=invalid");
        exit;
    }
} catch (PDOException $e) {
    header("Location: login.php?error=server");
    exit;
}
    
   
    
   
    // $connection = obdc_connect('DRIVER={ODBC Driver 18 for SQL Server};Server=tcp:sizeserver2.database.windows.net,1433;DATABASE=sizedb5;UID=ooas3;PWD=Password22!!;CONNECTION TIMEOUT=30;');
}




?>
    
