<?php
include_once('../DB_connection/connection.php');
$videoBlogDb = new Database();
$con= $videoBlogDb->connect('debateplus');
$videoName=$_GET['vName'];

$file = "test_upload/".$_GET['f'];
if (!unlink($file))
{
    echo ("Error deleting $file");
}
else
{

    echo ("Deleted $file");
    echo $deleteQuery="delete from video where video_name='$videoName'";
    $res=mysqli_query($con,$deleteQuery);
}
