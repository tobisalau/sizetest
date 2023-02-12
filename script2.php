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
    $uname = $pword = $email = $pword2 = "";
    $firstErr = "";
    
    if (empty($_POST["username"])) {
        errHan("Please enter a username");
        header("Location: index.php?error=emptyname");
        exit;
    }
    else {
        $uname = vali_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9_]*$/",$uname)) {
            errHan("Only letters, number and underscores are allowed in usernames");
            header("Location: index.php?error=Invalid-Username");
            exit;
        }
    }
  
    if (empty($_POST["email"])) {
        errHan("Please enter an email");
        header("Location: index.php?error=emptyemail");
        exit;
    }
    else {
        $email = vali_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            errHan("Only letters, number and underscores are allowed in usernames");
            header("Location: index.php?error=Invalid-Email-Format");
            exit;
        }
    }
    
    if (empty($_POST["pwrd"])) {
        errHan("Please enter a password");
        header("Location: index.php?error=emptypassword");
        exit;
    }
    else {
        $pword = vali_input($_POST["pwrd"]);
        $pword2 = vali_input($_POST["pwrd2"]);
        if (!$pword == $pword2) {
          header("Location: index.php?error=password-unmatch");
            exit; 
        }
    }
   
    try {
    $uname = vali_input($_POST["username"]);
    $pword = vali_input($_POST["pwrd"]);
    $conn = new PDO("sqlsrv:server = tcp:sizeserver2.database.windows.net,1433; Database = sizedb5", "ooas3", "Password22!!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tl = "SELECT username FROM Users";
    $tsql = $conn->query($tl);
    $ppl = $tsql->fetchAll();
    $match_found = false;
    foreach ($ppl as $person) {
        if ($username == $person) {
            $match_found = true;
            break;
        }
    }
    if ($match_found) {
        header("Location: index.php?error=usernametaken");
        exit;
    } 
      $pword = hash('md5', $pword);
    $tp = "INSERT INTO users (username, pword, email) VALUES ('$name', '$pword', $email)";
     $conn->exec($tp);
      header("Location: index.php?error=itworkedmate");
    exit;
    } 
    catch (PDOException $e) {
    header("Location: index.php?error=server");
    exit;
}
    
   
    
   
    // $connection = obdc_connect('DRIVER={ODBC Driver 18 for SQL Server};Server=tcp:sizeserver2.database.windows.net,1433;DATABASE=sizedb5;UID=ooas3;PWD=Password22!!;CONNECTION TIMEOUT=30;');
}




?>
    
