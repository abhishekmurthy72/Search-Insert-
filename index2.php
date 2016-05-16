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


<?php
// Below is to post and get data from *******ELASTICSEARCH***********

if(isset($_POST["submit"]))
{
require_once "init.php";
$name=$_POST["insertbox"];
$id=$_POST["insertid"];
$indexed = $es -> index([
 'index' =>'test',
 'type'=>'test',
'body'=>[
         'name' =>$name,
         'id'=>$id
        ]
	]);
if($indexed)
{	echo "<div class=\"hellow\"><b><center>Inserting <font color=\"blue\"><h2>"; 
        print_r($indexed);
          
        echo "</h2><br/></font>into elastic search database</center></b></div>"; 
}
}
?>
