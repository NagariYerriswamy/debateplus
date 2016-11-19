<!DOCTYPE html>
<?php
error_reporting(1);
$allVideoCategory=array();
$allCategory=array();
$allVideoArray=array();
$allDesc=array();
$allCat=array();
$catWise=array();
$videoToFileArray=array();
$dir = "admin/test_upload";
include_once('DB_connection/connection.php');
$videoBlogDb = new Database();
$con1= $videoBlogDb->connect('debateplus');
$selectQuery="select file_name,video_name,description,category from video";
$res=mysqli_query($con1,$selectQuery);
while($row=mysqli_fetch_array($res)){
$desc=array($row['file_name']=>$row['description']);
$allDesc=array_merge($allDesc,$desc);

$cat=array($row['video_name']=>$row['category']);
$catWise=array_merge($catWise,$cat);

$videoToFile=array($row['video_name']=>$row['file_name']);
$videoToFileArray=array_merge($videoToFileArray,$videoToFile);

$cat=array($row['file_name']=>$row['category']);
$allVideoCategory=array_merge($allVideoCategory,$cat);

$videoName=array($row['file_name']=>$row['video_name']);
$allVideoArray=array_merge($allVideoArray,$videoName);
}
//print_r($allVideoArray);
?>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Welcome to Debate+</title>
   
<link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">
  <link href="new.css" rel="stylesheet">
  <script src="jquery-1.9.1.min.js"></script>
   
</head>


<body>

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

    <?php include("header.php");?>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu" data-type="collapse">
     <!--  <div data-scrollable> -->
        <ul class="sidebar-menu">
        <?php $selectQuery="select * from category";
                        $selResult=mysqli_query($con1,$selectQuery);?>
		  <li><a href="../../../index.php"></i> <span><?php echo $catRow['cat_name'];?></span></a></li>
        <?php while($catRow=mysqli_fetch_assoc($selResult)):?>
          <?php $allCat[]=$catRow['cat_name']; ?>		 
		 <li><a href="video.php?v=<?php echo $catRow['cat_name']?>"><span><?php echo $catRow['cat_name'];?></span></a></li>
        <?php endwhile;?>
		<?php //var_dump(ini_get('post_max_size'));?>
		<?php //var_dump($allCat);?>

        </ul>
    </div>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar sidebar-chat right sidebar-size-2 sidebar-offset-0 chat-skin-white sidebar-visible-mobile" id=sidebar-chat>
      <div class="split-vertical">
        <div class="chat-search">
          <input type="text" class="form-control" placeholder="Search" />
        </div>

        <ul class="chat-filter nav nav-pills ">
          <li class="active"><a href="#" data-target="li">All</a></li>
          <li><a href="#" data-target=".online">Online</a></li>
          <li><a href="#" data-target=".offline">Offline</a></li>
        </ul>
        <div class="split-vertical-body">
          <div class="split-vertical-cell">
            <div data-scrollable>
              <ul class="chat-contacts">
                
                
                
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="st-pusher" id="content">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <div class="container-fluid content">
            <div class='col-lg-9 col-md-9 col-sm-9 col-xs-12'>
              <div class="row">
             <div class="hr">
       <div class="headind">
                  <div class="samevid">
                   <h4 class="sugest">New Arrivals<span class="subhd"><a href="video.php?v=">more</a></h4>
                                     </div>
              </div>
            <div class='row'>
                      

                      <?php    $ctr=0;
					  foreach($allVideoArray as $singleVideo){
                      $ctr++;
					  if($ctr<=4){
                      ?>
                   		<div class='col-lg-3 col-sm-3 col-md-3 col-xs-12'>
                      <!-- 4:3 aspect ratio -->
                      <a href="single.php?v=<?php echo $singleVideo; ?>" target="_blank">
                      <video id="thumb">
                      <source  src="../admin/test_upload/<?php echo $videoToFileArray[$singleVideo];?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'>
                      </video>
                        <div class="panel-body">
						  <span class="desc"><?php echo $singleVideo;?></span>
                          <span class="desc"><?php //echo $allDesc[$file];?>  </span>
                        </div>   
                  
                         </a>
                         </div>
			
                      <?php
					  }
                      }?>

                   </div>  

            </div>
                   <!-- End of ul carosuel -->
  
<!-- All category slider begins -->
          
<?php foreach($allCat as $category):?>
       <div class="hr">
	   <div class="headind">
                  <div class="samevid">
                   <h4 class="sugest"><?php echo $category?><span class="subhd"><a href="video.php?v=<?php echo $category?>">more</a></h4>
                                     </div>
              </div>
                 
            <div class='row'>
			<?php //var_dump($allVideoCategory);?>
                     

                      <?php 
					  $ctrCat = 0;
					  foreach($allVideoArray as $singleVideo){ 
					  //echo $allVideoCategory[$file]."-------".$category."</br>";
					  if(strpos($allVideoCategory[$videoToFileArray[$singleVideo]],$category) !== false){
						  //echo "test";
                      //  var_dump($file);
                       $ctrCat++;
					  if($ctrCat <= 4){
                      ?>

					<div class='col-lg-3 col-sm-3 col-md-3 col-xs-12'>
						<!-- 4:3 aspect ratio -->
						<a href="single.php?v=<?php echo $singleVideo; ?>" target="_blank">
						<video id="thumb">
							<source  src="../admin/test_upload/<?php echo $videoToFileArray[$singleVideo];?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'>
						</video>
						<div class="panel-body">
						  <span class="desc"><?php echo $singleVideo;?></span>
						  <span class="desc"><?php //echo $allDesc[$file];?>  </span>
						</div>
						</a>
				    </div> 
					<?php
					  }
                       }
                      }
					?>                                 
            </div>
			</div>
	<?php endforeach;?>	
 </div>
<!-- all categories slider ends -->
	
      <!-- End of ul carosuel --> 

      </div>
      <!-- /st-content -->
      <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12' style="margin-top:19px; left:16px;">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                          <!-- responsive -->
                          <ins class="adsbygoogle"
                          style="display:block"
                          data-ad-client="ca-pub-7660213401140271"
                          data-ad-slot="8094580945"
                          data-ad-format="auto"></ins>
                          <script>
                          (adsbygoogle = window.adsbygoogle || []).push({});
                          </script>
  </div>
      </div>
    </div>
    </div>
    <!-- /st-pusher -->

    <!-- Footer -->
    <footer class="footer">
      <strong>Debate+ &nbsp; &nbsp;</strong> &copy; Copyright 2016
    </footer>
    <!-- // Footer -->

  </div>
  </div>
  <!-- /st-container -->

  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  


  <script src="js/app/app.js"></script>
 <script src="js/vendor/all.js"></script>
  

</body>


</html>
<script>

</script>
 <script src="js/custom.js"></script>