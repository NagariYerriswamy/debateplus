<?php
/**
 * Created by PhpStorm.
 * User: nishant
 * Date: 09-06-2016
 * Time: 11:01
 */
$catName=$_GET['cat'];
//echo $_GET['cat']."test";
include_once("../DB_connection/connection.php");
$dbObject= new Database();
$conn=$dbObject->connect('debateplus');
$selectQuery="select cat_id from category where cat_name='$catName'";
$selectRes=mysqli_query($conn,$selectQuery);
$row=mysqli_fetch_assoc($selectRes);
$catId=$row['cat_id'];
if(!$catId) {
    $insertQuery = "insert into category (cat_name) values ('$catName')";
    $result = mysqli_query($conn, $insertQuery);
}
//var_dump($catId);
$conn->close();
?>
<script>
    var result='<?php echo $catId;?>';
   var url1;
    if(result){
         url1="createCat.php?r=found";
    }else{
         url1="createCat.php";

    }
    jQuery.ajax({
       url:url1,
       success:function(response){
           jQuery("#content").html(response);
       }
    });
</script>
