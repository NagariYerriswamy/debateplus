<?php
$catName=$_GET['name'];
$catId=$_GET['id'];

//echo $_GET['cat']."test";
include_once("../DB_connection/connection.php");
$dbObject= new Database();
$conn=$dbObject->connect('debateplus');
$updateQuery="update category set cat_name='$catName' where cat_id=$catId";
$res=mysqli_query($conn,$updateQuery);
if($res){
	echo "Category Name updated";
}else{
	echo "Error updating category";
}
?>