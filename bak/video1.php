<!DOCTYPE html>
<?php
$allVideoArray=array();
$dir = "admin/test_upload";
include_once('DB_connection/connection.php');
$videoBlogDb = new Database();
$con1= $videoBlogDb->connect('debateplus');
$selectQuery="select file_name,video_name from video";
$res=mysqli_query($con1,$selectQuery);
while($row=mysqli_fetch_array($res)){
$videoName=array($row['file_name']=>$row['video_name']);
$allVideoArray=array_merge($allVideoArray,$videoName);
}
//print_r($allVideoArray);
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="jquery-1.9.1.min.js"></script>
<script src="owl.carousel.js"></script>
<link rel="stylesheet" href="owl.carousel.css" />
</head>
<body>
	<div class="container-fluid">
		 <div class="row">
		 	<div class="header_img">

		 	<div id="header-links">


      <ul class="about-custom-links">
            <li class="channel-links-item">
    <a href="https://www.facebook.com/musiconjhankar?ref=hl" rel="me nofollow" target="_blank" title="Facebook" class="about-channel-link yt-uix-redirect-link about-channel-link-with-icon">
        <img src="favicons.png" class="about-channel-link-favicon" alt="" width="16" height="16">
        <span class="about-channel-link-text">
          Facebook
        </span>
    </a>
  </li>

      </ul>
  </div>

		 	</div>
		 	<!-- Header image -->
		 </div>
		 <!-- End of row -->

		 <div class="vid_contain">
		 	<div class="row">
		 		<div class="col-lg-12 col-md-12">
		 			<div class="col-lg-5 col-md-5 first_content">
                         <h5>What to watch next</h5>
                         <div class="vid_cont">
                            <img src="img.jpg">
                         </div>
		 			</div>
		 			<div class="col-lg-3 col-md-3">
		 				<div class="head_vid">
 						   	 <h5>List For videos</h5>
		 				</div>
		 				<div class="singvid">

		 				 <div class="content row">
						<div class="col-lg-6 col-md-6 col-sm-6 item">
						
						<div class="panel panel-default">
						<!-- 4:3 aspect ratio -->
						<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
						</div>
                        	</div>
                        	</div>
						<div class="col-lg-6 col-md-6 col-sm-6  panel-body">
						Amazing 3D Animation
						</div>
					     </div>

					   
					
					   	 <div class="content row">
						<div class="col-lg-6 col-md-6 col-sm-6 item">
						
						<div class="panel panel-default">
						<!-- 4:3 aspect ratio -->
						<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
						</div>
                        	</div>
                        	</div>
						<div class="col-lg-6 col-md-6 col-sm-6  panel-body">
						Amazing 3D Animation
						</div>
					     </div>


					   
					
					   	 <div class="content row">
						<div class="col-lg-6 col-md-6 col-sm-6 item">
						
						<div class="panel panel-default">
						<!-- 4:3 aspect ratio -->
						<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
						</div>
                        	</div>
                        	</div>
						<div class="col-lg-6 col-md-6 col-sm-6  panel-body">
						Amazing 3D Animation
						</div>
					     </div>



					   
					
					   	 <div class="content row">
						<div class="col-lg-6 col-md-6 col-sm-6 item">
						
						<div class="panel panel-default">
						<!-- 4:3 aspect ratio -->
						<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
						</div>
                        	</div>
                        	</div>
						<div class="col-lg-6 col-md-6 col-sm-6  panel-body">
						Amazing 3D Animation
						</div>
					     </div>



					   
					
					   	 <div class="content row">
						<div class="col-lg-6 col-md-6 col-sm-6 item">
						
						<div class="panel panel-default">
						<!-- 4:3 aspect ratio -->
						<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
						</div>
                        	</div>
                        	</div>
						<div class="col-lg-6 col-md-6 col-sm-6  panel-body">
						Amazing 3D Animation
						</div>
					     </div>


					   
					
					   	 <div class="content row">
						<div class="col-lg-6 col-md-6 col-sm-6 item">
						
						<div class="panel panel-default">
						<!-- 4:3 aspect ratio -->
						<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
						</div>
                        	</div>
                        	</div>
						<div class="col-lg-6 col-md-6 col-sm-6  panel-body">
						Amazing 3D Animation
						</div>
					     </div>


					   
					
					   	 <div class="content row">
						<div class="col-lg-6 col-md-6 col-sm-6 item">
						
						<div class="panel panel-default">
						<!-- 4:3 aspect ratio -->
						<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
						</div>
                        	</div>
                        	</div>
						<div class="col-lg-6 col-md-6 col-sm-6  panel-body">
						Amazing 3D Animation
						</div>
					     </div>
					
						</div>
						<!-- End of song video -->
		 			</div>

		 			<!-- End of video list -->
		 			<div class="col-lg-4 col-md-4 col-sm-4 add">
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
		</div>

		<div class="container-fluid">
			<div class="row">
				      <div class='ul-carousel vid_cont'>
                      <?php if (is_dir($dir)){
                      if ($dh = opendir($dir)){?>

                      <?php while (($file = readdir($dh)) !== false){
                      //  var_dump($file);
                      if($file!="."&& $file!="..") {
                      ?>



                      <!-- 4:3 aspect ratio -->

                      <a href="single.php?v=<?php echo $file; ?>&&name=<?php echo $allVideoArray[$file];?>" target="_blank">
  
                      <video id="thumb">
                      <source  src="../admin/test_upload/<?php echo $file;?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'>
                      </video>    
                      

                        <div class="panel-body">
                          <span class="desc"><?php echo $allVideoArray[$file];?>
                          <span class="desc"><?php echo $allDesc[$file];?>
                      </span>
                        </div>
                         </a>


               
                 


            

                      <?php
                      }
                      }?>
                      
                      <?php closedir($dh);
                      }
                      }?>    

            </div>
			</div>
		</div>


</body>

<style type="text/css">
.header_img {
    background-image: url("head_img.jpg");
    height: 250px;
    background-repeat: no-repeat;
    background-size: cover; 
    position:relative; 
}
.singvid{
    position: relative;
    top: 4px;
    height: 360px;
    overflow-x: hidden;
    overflow-y: scroll;
}
.add {
    height: 280px;
    position: relative;
    top: 28px;
}
div#header-links {
    width: 25%;
    position: relative;
    float: right;
    top: 77.5%;
}
li.channel-links-item {
    list-style: none;
}
li.channel-links-item a {
    text-decoration:none; 
    background-color: rgba(102,102,102,0.5);
    width: 100px;
}
.head_vid {
    height: 20px;
    border-bottom: 1px solid #ccc;
}

.ul-carousel, .ul-carousel1,.ul-carousel2{
  width:90%;
  margin:auto;
}
.my_slider{
  width: 100%;
  margin-left: 2px;
  margin-right: 2px;
  background: green;
}
.owl-prev img, .owl-next img{
  width:20px;
  height:20px;
  }
  
p.my_text {
    text-align: center;
    line-height: 200px;
  }
.owl-prev {
    position: absolute;
    top: 67px;
    left: -25px;
    font-size: 20px;
}
.owl-next {
    position: absolute;
    top: 67px;
    right: -25px;
    font-size: 20px;
}
</style>
</html>
