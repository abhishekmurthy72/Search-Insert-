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
 //  searching from ******************Elastic Search**************************
        if(isset($_POST["search"]))
     {
      require_once "init.php";

          $searchid=$_REQUEST["searchbox"]; 
      $query = $es->search([
         'body'=>[
                  'query'=>[
                           'bool'=>[
                                   
                                     'should'=>[
                                                 'match'=>['name'=>$searchid],
                                                  'match'=>['id'=>$searchid]
                                                ]

                                   ]
                           ]
                 ]
          ]);
      if($query['hits']['total']==0)
        
      {echo "<div class=\"hellow\"><b><center><br/><br/><br/><br/><br/>No Details found in elastic search database</center></b></div>";}   
          
          else{ 
$result = $query['hits']['hits'];
           echo "<div class=\"hellow\"><b><center>Details: <font color=\"blue\"><h2>"; 
                 print_r($query);
                  echo "</h2><br/></font>From elastic search database</center></b></div>"; 
              }
        } 
       
?>