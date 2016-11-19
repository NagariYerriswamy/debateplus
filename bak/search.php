<?php
$searchVid="%".$_GET['data']."%";
include_once('DB_connection/connection.php');
$videoBlogDb = new Database();
$con1= $videoBlogDb->connect('debateplus');
$selectVideo="select video_name,file_name from video where video_name like '$searchVid'";
$res=mysqli_query($con1,$selectVideo);
$vArray=array();
while($row=mysqli_fetch_array($res)){
	$vArray['vName'][]=$row['video_name'];
	$vArray['vFile'][]=$row['file_name'];
} 
echo json_encode($vArray);
?>