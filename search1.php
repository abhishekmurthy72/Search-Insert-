<!DOCTYPE html>
<html>
<head>
<title>API-3</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body background="css/backcover.jpg" color="white">
<br/><br/><br/>
<center><form method="post" name="adddb">
<label id="txt1"><b>Enter Your Id to search your details:</b></label>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="searchbox" id="txtbox" placeholder="&nbsp;&nbsp;SearchBox......"/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search" value="Search ID" id="sub1" />
</form></center>
</body>
</html>
 
<?php
 //  searching from redis
        if(isset($_POST["search"]))
     {
        $searchid=$_REQUEST["searchbox"]; 
            $redis = new Redis(); 
            $redis->connect('127.0.0.1');
          
          $val = $redis->smembers($searchid);
        
          if($searchid=="" || $val=="nil")
          { echo "<div class=\"hellow\"><b><center>";      
              echo "ID not found in  Redis database</center></b></div>";
            }
            else{ echo "<div class=\"hellow\"><b><center>Details: <font color=\"blue\"><h2>"; 
                  print_r($val);
                  echo "</h2><br/></font>From redis database</center></b></div>"; 
                }
        } 
       
?>