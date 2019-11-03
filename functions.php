<?php
if (empty(getenv("DATABASE_URL"))){
      $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=', '', '');
  } 
 else {
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));

  }
  

//this is used to execute all SQL queries
function queryMysql($query) {
    global $pdo;
    $result = $pdo->query($query);
    if (!$result) {
        die ($pdo->error);
    }
    return $result;
}

//this is for security purpose
function sanitizeString($str) {
    global $connection;
    $str = strip_tags($str); //remove html tags
    $str = htmlentities($str); //encode html (for special characters)
    if (get_magic_quotes_gpc()){
        $str = stripslashes($str); //Don't use the magic quotes
    }
    //Avoid MYSQL Injection
    $str = $connection->real_escape_string($str);
    return $str;
}

//Convert password into encrypted form
function passwordToToken($password){
    global $salt1;
    global $salt2;
    $token = hash ("ripemd128", "$salt1$password$salt2");
    return $token;
}

//Add user to the database
function addUser($username, $password, $status){
    //Setup one default user
    $result = queryMysql("SELECT * FROM User where username='$username'");
    $row = mysqli_fetch_assoc($result);
    if (!$row) { //user doesn't exist
        //Add a default user
        $token = passwordToToken($password);
        $query = "INSERT INTO User(username, password, status) VALUES('$username', '$token', '$status')";
        queryMysql($query);
        return 1; //added
    }else {
        return 0; //not added
    }
}