<?php
require_once './header.php';
require_once './restrictedsession.php';
$query = "SELECT iId, iName, iDescription, iPrice, iStatus, iSize, iImage FROM Item";
if(isset($_POST['keyword'])){
    $keyword = sanitizeString($_POST['keyword']);
    $query = $query . " WHERE iName LIKE '%$keyword%' OR iId LIKE '%$keyword%'";
}
$result = queryMysql($query);
$error = $msg = "";
if (!$result){
    $error = "Couldn't load data, please try again.";
}
?>
<br><br>
<div>
    <form action="loaditem.php" method="post">
        Search Product:
        <input type="search" name="keyword"/>
        <input type="submit" value="Go"/>
    </form>
</div>
<br>
<table class="tbl">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Status</th>
        <th>Size</th>              
        <th>Image</th> 
        <th>Options</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $iId = $row[0];
        $iName = $row[1];
        $iDescription = $row[2];
        $iPrice = $row[3];
        $iStatus = $row[4];
        $iSize = $row[5];
        $iImage = $row[6];             
        echo "<tr>";
        echo "<td>$iId</td>";
        echo "<td>$iName</td>";
        echo "<td>$iDescription</td>";
        echo "<td>$iPrice</td>";
        echo "<td>$iStatus</td>";
        echo "<td>$iSize</td>";
        echo "<td ><img src='./images/item/". $iImage . "' height='10%'></td>";
        ?>
        <td>
            <form class="frminline" action="deleteitem.php" method="post" onsubmit="return confirmDelete();">
                <input type="hidden" name="iId" value="<?php echo $row[0] ?>" />
                <input type="submit" value="Delete" />
            </form>
            <form class="frminline" action="updateitem.php" method="post">
                <input type="hidden" name="iId" value="<?php echo $row[0] ?>" />
                <input type="submit" value="Update" />
            </form>
        </td>
        <?php
        echo "</tr>";
    }
    ?>
    <script>
        function confirmDelete() {
            var r = confirm("Are you sure you would like to delete ?");
            if (r) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</table>
</body>
</html>

