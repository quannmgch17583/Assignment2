<?php
require_once './header.php';
if (isset($_POST['cid'], $_POST['cname'], $_POST['cdescription'])) {
    $sql = "INSERT INTO catalogue(cid, cname, cdescription) values(:cid , :cname, :cdescription)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cid', $_POST['cid'], PDO::PARAM_STR);
    $stmt->bindValue(':cname', $_POST['cname'], PDO::PARAM_STR);
    $stmt->bindValue(':cdescription', $_POST['cdescription'], PDO::PARAM_STR);
    $pdoExec = $stmt->execute();
    
        //If mysql inserted successful
    if($pdoExec)
    {
        echo 'Inserted successful';
    }else{
        echo 'Error! Try again';
    }
}
?>
<br>
<form action = "addcatalogue.php" method = "post">
    <fieldset class = "fitContent">
        <legend>Add Catalogue</legend>
        ID : <br>
        <input type="text" name="cid"/><br>
        Name<br>
        <input type="text" name="cname"   required /><br>
        Description<br>
        <textarea name="cdescription" ></textarea>
        <br><br>
        <input type="submit" value="Add" /><br>
        <span><?php echo $message; ?></span><br>
    </fieldset>
    
</form>
</body>
</html>

