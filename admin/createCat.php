<?php
/**
 * Created by PhpStorm.
 * User: nishant
 * Date: 08-06-2016
 * Time: 23:25
 */
if(isset($_GET['r'])){
    $found=true;
}else{
    $found=false;
}
include_once("../DB_connection/connection.php");
$dbObject= new Database();
$conn=$dbObject->connect('question_blog');?>

<form id="create_category">
    <div class="form-group input-group">
        <label for="inputlg">Category Name</label>
        <input class="form-control input-normal" id="catName" type="text">
    </div>
    <div class="form-group input-group">
        <button type="button" class="btn btn-success" id="addCat">Add Category</button>
    </div>

</form>
 <!-- Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                   <div class="form-group input-group">
						<label for="inputlg">Category Name</label>
						<input class="form-control input-normal" id="catNameModal" type="text" required>
						<input id="catIdModal" type="hidden" value="0" >
					</div>
					<div class="form-group input-group">
                      <button type="button" class="btn btn-success" onclick="catUpdate();">Update</button>
                    </div>
				</div>
                <div class="modal-footer custom">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<?php
$selectQuery="select * from category";
$result=mysqli_query($conn,$selectQuery);
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th>S.no</th>
        <th>Category Name</th>
    </tr>
    </thead>
    <tbody>
<?php while($row=mysqli_fetch_array($result)):?>
    <tr>
        <td><?php echo $row['cat_id'];?></td>
        <td><?php echo $row['cat_name'];?></td>
        <td><button data-toggle="modal" class="btn btn-success openModal" onclick="showCatModal(<?php echo $row['cat_id'].",'".$row['cat_name']."'";?>);" data-target="#myModal1">Edit</button></td>
    </tr>
<?php endwhile;?>
    </tbody>
</table>
<script>
    var found='<?php echo $found?>';
if(found) {
    alert("category already exist");
    jQuery("#catName").focus();
}
    jQuery("#addCat").click(function(){
     var catName=jQuery("#catName").val();
       if(!(catName)){
           alert("Enter the category name");
       }else{
       jQuery("#addCat").attr('page_link','addCat.php?cat='+catName);
           redirect(jQuery("#addCat"));
       }
    });
	function showCatModal(id,name){
		//alert(id);
		jQuery("#catNameModal").val(name);
		jQuery("#catIdModal").attr('value',id);
		
		//alert(name); 
	}
	function catUpdate(){
		var newName=jQuery("#catNameModal").val();
		var newid=jQuery("#catIdModal").val();
		jQuery.ajax({
			url:"catUpdate?name="+newName+"&&id="+newid,
			success: function(response){
				alert(response);
				
				//redirect(jQuery("#addCat"));
				//jQuery(".modal-backdrop.fade.in").hide();
			}
		});
	}
</script>