<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/menu_style.css?v=<?php echo time();?>" type="text/css"/>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>WarmUp Management System</title>
    </head>
    <body>
    <center><img src="images/banner.png"</center>
    <?php
    require_once './functions.php';
    $userstr = '(Guest)';
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $userstr = "($user)";
        $loggedin = TRUE;
    } else {
        $loggedin = FALSE;
    }
    if ($loggedin) {
        include_once './menu_admin.php';
    } else {
        include_once './menu_guest.php';
    }
    ?>
</body>
</html>

