<!DOCTYPE html>
<html>

<head>
<title>API-1&API-2</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body background="css/backcover.jpg" color="white">
<br/><br/><br/>
<center><form method="post" name="adddb">
<ul style="list-style-type:none;"><li>
<label id="txt1"><b>Enter Your Id:</b></label>
<br/><input type="text"  id= "txtbox" name="insertid" placeholder="&nbsp;&nbsp;Enter your id " />
<br/><label id="txt1"><b>Enter Your Name:</b></label>
<br/><input type="text"  id= "txtbox" name="insertbox" placeholder="&nbsp;&nbsp;Enter your name here " />
<br/><br/><input type="submit" id="sub1" value="Insert to data base" name="submit" />	
</form></center> 
</body> 
</html>
     <?php if(isset($_POST["submit"]))
      {
// Below is the redis inserting data and getting the data code
$name=$_POST["insertbox"];
$id=$_POST["insertid"];
 $redis = new Redis(); 
 $redis->connect('127.0.0.1');
 if($name=="")
 {echo "<div class=\"hellow\"><b><center><br/><br/><br/>It seems like textbox is empty</center></b></div>";}
 else 
 	{ 
 		$redis->sadd($id, $name);
 		$value = $redis->smembers($id);
 		echo "<div class=\"hellow\"><b><center>Inserted <font color=\"blue\"><h2>"; 
        print_r($value);
          
        echo "</h2><br/></font>into redis database</center></b></div>"; 
        } 
        } 
?>