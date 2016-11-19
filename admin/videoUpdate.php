<?php
/**
 * Created by PhpStorm.
 * User: nishant
 * Date: 07-06-2016
 * Time: 14:22
 */
print_r($_POST);
$newVname=$_POST['modal_vName'];
$newVDes=$_POST['modal_description']; 
$vId=$_POST['modal_vId'];
$concatCategory="";
$catArray=explode(",",$_POST['selCat']);
foreach($catArray as $cat){
	$concatCategory .= json_encode($cat);
}
$selCat="[".str_replace(',','","',json_encode($_POST['selCat']))."]";



include_once('../DB_connection/connection.php');
$videoBlogDb = new Database();
$con1= $videoBlogDb->connect('debateplus');
echo $updateQuery="update video set video_name='$newVname',description='$newVDes',category='$selCat' where id='$vId'";
$res=mysqli_query($con1,$updateQuery);

header("Location: http://" . $_SERVER['SERVER_NAME'] . "/admin/index.php");




