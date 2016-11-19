<!DOCTYPE html>

<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<head>
<?php 
$qS=explode("=",$_SERVER['QUERY_STRING']);
//var_dump($qS);
$fName=urldecode($qS[1]);
$urlName=$fName;
$fName=str_replace("sps"," ",$fName);

include_once('DB_connection/connection.php');
$videoBlogDb = new Database();
$con1= $videoBlogDb->connect('debateplus');
$dir = "admin/test_upload";
$selectVName="select file_name,link_type,description from video where video_name='$fName'";
$res=mysqli_query($con1,$selectVName);
$row=mysqli_fetch_array($res);
$lType=$row['link_type'];
$vidName=$row['file_name'];
$vidDesc=$row['description'];
//print_r($row);
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta property="fb:app_id"           content="138509406553920"/>
  <meta property="og:url"           content="http://www.debateplus.com/single.php?v=<?php echo urlencode($urlName)?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="<?php echo $fName?>" />
	<meta property="og:description"   content="<?php echo $vidDesc?>" />
	<meta property="og:image"         content="http://www.debateplus.com/admin/test_upload/thumbnail/thumb_<?php echo str_replace(" ","_",$fName)?>.png" />
	<meta property="og:video"         content="http://www.debateplus.com/single.php?v=<?php echo urlencode($urlName)?>" />

  <title>Debate+</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">
  <link href="single.css" rel="stylesheet">

</head>

<body>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=138509406553920";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

    <!-- Fixed navbar -->
    <?php include("header.php");?>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu" data-type="collapse">
     <!--  <div data-scrollable> -->
        <ul class="sidebar-menu">  
        <?php $selectQuery="select * from category";
              $selResult=mysqli_query($con1,$selectQuery);?>
        <?php while($catRow=mysqli_fetch_assoc($selResult)):?> 
		  <li><a href="video.php?v=<?php echo $catRow['cat_name']?>"><span><?php echo $catRow['cat_name'];?></span></a></li>
        <?php endwhile;?>          <!-- <li class="category">Navigation</li> -->

        </ul>

    </div>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar sidebar-chat right sidebar-size-2 sidebar-offset-0 chat-skin-white sidebar-visible-mobile" id=sidebar-chat>
      <div class="split-vertical">
        <div class="chat-search">
          <input type="text" class="form-control" placeholder="Search" />
        </div>

        <div class="split-vertical-body">
          <div class="split-vertical-cell">
            <div data-scrollable>
              <ul class="chat-contacts">
                  
                    <div class="media">
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <!-- ashwin -->
              <div class="container-fluid">
                <div class="row">
                   <div class="col-lg-12 col-md-12 col-xs-12">
                     <div class="col-lg-8 col-md-8">
                        <div class="ads col-lg-4 col-md-4">
						
						  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- 336*280 -->
							<ins class="adsbygoogle"
								 style="display:inline-block;width:336px;height:280px"
								 data-ad-client="ca-pub-7660213401140271"
								 data-ad-slot="1132178542"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
    					  </script>
						
						</div>
						<div id="videoContainer">
						<?php if($lType=="youtube"){?>
						     <object data="https://www.youtube.com/embed/<?php echo $row['file_name'];?>"
                             width="700" height="360"></object>
                        <?php }else{?>
							<video  id="video11" class="vidst" width="700" height=360" controls>
						       <source  src="admin/test_upload/<?php echo $row['file_name']?>" type="video/mp4">
                             </video>
						<?php }?>
                            <div class="vide_heading">
                              <div id="watch-headline-title">
                              <h1 class="watch-title-container">
                              <span class="vid_cont">
                              <?php echo $fName;?>
                                                        
                              </span>
                              </h1>
                              </div>
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6abt">
                             <div class="panel-heading">

                       
                     
                    </div>
                       </div>
                         <div class="lkds">
                         <span class="like"><i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>Likes</span>
                         <span class="dislike"><i class="fa fa-thumbs-down fa-2x" aria-hidden="true"></i>Dislikes</span>
                           <div class="fb-share-button" 
						  data-href="single.php?v=<?php echo $fName?>" 
						  data-layout="button_count" 
						  data-size="small" 
						  data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdebateplus.com%2F&amp;src=sdkpreparse"></a></div> 
                         </div>

                    </div>
                      <div class="col-lg-4 col-md-4">
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

              <div class="headind">
                  <div class="samevid">
                   <h4 class="sugest">Recommended</h4>
               </div>
              </div>
              <div class="singlvid">
            <div class="timeline row" data-toggle="isotope">
               <div class="listvideo">

				  <?php 
				  
				   $selectV="select * from video LIMIT 0,10 ";
				  $sVRes=mysqli_query($con1,$selectV);
				  //var_dump($sVRes);
				  while($vRow=mysqli_fetch_array($sVRes)){
					 // var_dump($vRow['file_name']);
                      ?>
                      <!-- 4:3 aspect ratio -->
                   <div class="col-xs-12  col-md-push-2 col-md-7 col-lg-push-2 col-lg-7 item">
                      <a href="single.php?v=<?php echo $vRow['video_name']; ?>" target="_blank">
                      <video id="thumb">
                      <source  src="../admin/test_upload/<?php echo $vRow['file_name'];?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'>
                      </video>
                        <div class="panel-body">
						  <span class="desc"><?php echo $vRow['video_name'];;?></span>
                          <span class="desc"><?php //echo $allDesc[$file];?>  </span>
                        </div>   
                      
                         </a>
                 
				   </div>
				   <?php }?>
            </div>
          </div>
        </div>
       </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
    <!-- Footer -->
    <footer class="footer">
      <strong>Debate+ &nbsp; &nbsp;</strong> &copy; Copyright 2016
    </footer>
    <!-- // Footer -->

  <script>
  
   jQuery(document).ready(function(){
	   var vType='<?php echo $lType;?>';
        console.log(vType);
  
	   if(vType=="youtube"){
		   var ctr=0;
       var timer1=setInterval(function(){
		     	if(ctr > 10){
                  jQuery(".ads").hide();
				  clearInterval(timer1);
				console.log("test");
				}
		   
			    ctr++;
		    },1000);
		}else{ 
			
			 var videoElement = jQuery('#video11')[0];
	  jQuery('#video11').removeAttr('controls');
	  var counter=0;
	  var timer=setInterval(function(){
		     	if(counter > 10){
                    videoElement.play();
					jQuery(".ads").hide();
					jQuery('#video11').prop('controls','true');
					clearInterval(timer);
				}
		   
			counter++;
		},1000);
		}
	});
  
  </script>
</body>
</html>