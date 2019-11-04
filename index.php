<!DOCTYPE html>
<html>
    <head>
        <title>ATN Store</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style1.css">
		<link rel="stylesheet" href="css/menu_style.css">
    </head>
    <body>
        <?php
require_once './functions.php';
//load items
$query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage FROM Item ";
$result = queryMysql($query);

?>
			<div class="container">
                <img id="logo" src="images/logo.png"/>
                <div class="nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#adidas">Adidas</a></li>
                        <li><a href="#nike">Nike</a></li>
                        <li style="float: right"><a href="index2.php">Admin</a></li>
                    </ul>
                </div>
            	<div class="main">
                	<div class="hot">
                    	<div class="image">
                        	<img src="images/main.jpeg">
                    	</div>
                    	<div class="detail">
                        	<div class="title">
                            Basketball Sneakers Shop
                        	</div>
                    	</div>
                	</div>
                	<div class="seperator">
                	</div>
                	<div class="item"></div>
            	</div>
        	</div>
                <div class="list w3-row">
                    <div class="" id="Adidas"><h2>Adidas</h2>
             <?php
     require_once './functions.php';
     $query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage,cname FROM item,catalogue WHERE item.cid=catalogue.cid AND cName LIKE '%Adidas%'  ORDER BY cname";
     $result = queryMysql($query);
     $result->setFetchMode(PDO::FETCH_ASSOC);
     $result->execute();
     $resultSet = $result->fetchAll();
     
     foreach ($resultSet as $row) {
        $iId = $row['iid'];
        $iName = $row['iname'];
        $iDescription = $row['idescription'];
        $iPrice = $row['iprice'];
        $iStatus = $row['istatus'];
        $iSize = $row['isize'];
        $iImage = $row['iimage'];
        
        echo "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-orange w3-padding-large'>$iStatus</div><div ><img onclick=\"document.getElementById('$iName').style.display='block'\" id='testimg' src='./images/". $iImage . "'  width: '500px', height: '500px'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice$</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-orange w3-center w3-padding-20'> 
          <span onclick=\"document.getElementById('$iName').style.display='none';\"
         class='w3-button w3-oranges w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/". $iImage . "' width='100%'>
          </div>
          <div class='w3-half w3-left'>
              <h3>Price: $iPrice$</h3>
              <p>Description: $iDescription.</p>
              <h4>Size: $iSize</h4>                           
          </div>                                                    
        </div>
        <button class='w3-button w3-orange w3-section' onclick=\"document.getElementById('$iName').style.display='none';\">Close <i class='fa fa-remove'></i></button>
      </div>
    </div>";                                                                                       
    }
?>
     
                </div>        
                    <div class="list w3-row">
                    <div class=""id="Nike"><h2>Nike</h2>
                    <?php
     require_once './functions.php';
    $query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage,cname FROM item,catalogue WHERE item.cid=catalogue.cid AND cName LIKE '%Nike%'  ORDER BY cname";
     $result = queryMysql($query);
     $result->setFetchMode(PDO::FETCH_ASSOC);
     $result->execute();
     $resultSet = $result->fetchAll();
     
     foreach ($resultSet as $row) {
        $iId = $row['iid'];
        $iName = $row['iname'];
        $iDescription = $row['idescription'];
        $iPrice = $row['iprice'];
        $iStatus = $row['istatus'];
        $iSize = $row['isize'];
        $iImage = $row['iimage'];
        
        echo "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-pink w3-padding-large'>$iStatus</div><div ><img onclick=\"document.getElementById('$iName').style.display='block'\" id='testimg' src='./images/". $iImage . "' width='100%'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice$</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-pink w3-center w3-padding-20'> 
          <span onclick=\"document.getElementById('$iName').style.display='none';\"
         class='w3-button w3-pink w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/". $iImage . "' width='100%'>
          </div>
          <div class='w3-half w3-left'>
              <h3>Price: $iPrice$</h3>
              <p>Description: $iDescription.</p>
              <h4>Size: $iSize</h4>                           
          </div>                                                    
        </div>
        <button class='w3-button w3-pink w3-section' onclick=\"document.getElementById('$iName').style.display='none';\">Close <i class='fa fa-remove'></i></button>
      </div>
    </div>";                                                                                       
    }
?>
     
                </div>  
                </div>    

                    
            <div class="footer">
              <div class="container-fluid" style="margin-left: 150px;">
  <div class="childfooter" id="leftfooter">
    <form action="#">
      <input type="text" placeholder="Enter your Email" style="border: 1px solid #484747; padding: 8px;">
      <input type="submit" value="Subcrible" style=" padding: 7px;
      padding-left: 20px;
      text-align: center;
      padding-right: 20px;
      background-color: white;
      background: gray;
      border: 1px solid #484747;">
    </form>
  </div>
  <div class="childfooter" id="rightfooter" style="padding: 20px; padding-left: 40px">ATN Sneakers Store - Designed by Quan</div>
              
            </div>
        </div>
    </body>
</html>

