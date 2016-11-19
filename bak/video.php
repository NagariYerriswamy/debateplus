<!DOCTYPE html>
<?php
$video="%".$_GET['v']."%";
$allVideoArray=array();
$dir = "admin/test_upload";
include_once('DB_connection/connection.php');
$videoBlogDb = new Database();
$con1= $videoBlogDb->connect('debateplus');
$selectQuery="select file_name,video_name from video where category like '$video'";
$res=mysqli_query($con1,$selectQuery);
//while($row=mysqli_fetch_array($res)){
  //var_dump($row);
//$videoName=array($row['file_name']=>$row['video_name']);
//$allVideoArray=array_merge($allVideoArray,$videoName);
//}
//print_r($allVideoArray);
?>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Debate+</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="css/vendor/all.css" rel="stylesheet">

  <!-- Vendor CSS Standalone Libraries
        NOTE: Some of these may have been customized (for example, Bootstrap).
        See: src/less/themes/{theme_name}/vendor/ directory -->
  <!-- <link href="css/vendor/bootstrap.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/font-awesome.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/picto.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/material-design-iconic-font.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/datepicker3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.minicolors.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/bootstrap-slider.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/railscasts.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery-jvectormap.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/owl.carousel.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/slick.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/morris.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/ui.fancytree.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/daterangepicker-bs3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/select2.css" rel="stylesheet"> -->

  <!-- APP CSS BUNDLE [css/app/app.css]
INCLUDES:
    - The APP CSS CORE styling required by the "social-1" module, also available with main.css - see below;
    - The APP CSS STANDALONE modules required by the "social-1" module;
NOTE:
    - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
      It was optimised to load only what is actually used by the "social-1" module;
      Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
      See src/less/themes/social-1/app.less
TIP:
    - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
  <link href="css/app/app.css" rel="stylesheet">

<script src="jquery-1.9.1.min.js"></script>
<script src="owl.carousel.js"></script>
<link rel="stylesheet" href="owl.carousel.css" />

</head>

<body>

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
      <li><a href="../../../index.php"> <span><?php echo $catRow['cat_name'];?></span></a></li>
        <?php while($catRow=mysqli_fetch_assoc($selResult)):?>
          <?php $allCat[]=$catRow['cat_name']; ?>    
     <li><a href="video.php?v=<?php echo $catRow['cat_name']?>"><span><?php echo $catRow['cat_name'];?></span></a></li>
        <?php endwhile;?>
    <?php //var_dump($allCat);?>
    <?php //var_dump($allCat);?>
         
        </ul>

     <!--  </div> -->
    </div>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar sidebar-chat right sidebar-size-2 sidebar-offset-0 chat-skin-white sidebar-visible-mobile" id=sidebar-chat>
      <div class="split-vertical">
        <div class="chat-search">
          <input type="text" class="form-control" placeholder="Search" />
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

  <div class="container-fluid conent">
    <div class='col-lg-9 col-md-9 col-sm-9 col-xs-12'>
     <div class="row">
  

            <div class="vid_contain ">
                <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="samevid cat_name">
                            <h2 class="sugest"><?php echo $_GET['v']?></h2>
                      <div class="butn">
                  <?php while($row=mysqli_fetch_array($res)):?>
                    <div class="col-lg-3 col-md-3 col-sm-3 solc-xs-6">

                                      <div class="vid_content">
                                               <a href="single.php?v=<?php echo $row['video_name']; ?>" target="_blank">

                                            <div class="video ">
                                               <video id="thumb">
                                                    <source  src="/admin/test_upload/<?php echo $row['file_name'];?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'>
                                            </video>
                                            </div>
                                            </a>
                                        </div>
                                      
                                    <div class="panel-body">
                                            <span class="desc">
                                               <a href="single.php?v=<?php echo $row['video_name']; ?>" target="_blank">
                                                         <?php echo $row['video_name'];?>
                                            </a>
                                            </span>
                                    </div>
                                    
                     </div>
                         
         <?php endWhile;?>

          


                      </div>

                  </div>
            </div>
           

      
        </div>
      </div>
      <!-- Container-fluid -->
  </div>
</div>
 <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
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

</body>

<style type="text/css">

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

video#thumb {
    width: 200px;
    height: 150px;
}
/* .sidebar.sidebar-skin-dark {
    background: #fff !important;
} */
.sidebar.sidebar-skin-dark.left {
    /* border-right: 1px solid #2e2e2e; */
    height: 800px !important;
    position:fixed !important;
    top:96px; 
    }
    span.subhd {
    font-size: 12px;
    position: relative;
    left: 8px;
}
span.subhd  a{
   /* color:#ccc !important; */
    left: 8px;
}
.samevid.cat_name {
    position: relative;
    width: 100%;
    left: 1%;
    color: #ccc;
    border-bottom: 1px solid #ccc;
}

 html.st-layout .st-content {
     height: 100%;
}

    @media screen and (min-width: 250px)  and (max-width: 720px){

.butn ,i.fa.fa-comments {
  display:none !important; 
}
button.navbar-toggle.collapsed {
    display: none !important;
}
.vidst {
    width: auto !important;
}


}

/* body {
    background: #f1f1f1;
}
.sidebar.sidebar-skin-dark .sidebar-menu i {
    color: #757575;
    display: none !important;
} 
.sidebar.sidebar-skin-dark .sidebar-menu {
    border-color: #2e2e2e;
    position: relative;
    top: 6%;
    border-right: 1px solid #ccc;
}*/
.sidebar.sidebar-skin-dark .sidebar-menu > li {
    border-bottom: 1px solid #ccc;
}
i.icon-search {
    color: #222;
    padding: 4px 20px;
    /* border: 1px solid; */
    position: relative;
    right: 13px;
    border: 1px solid #ccc;
    box-shadow: 1px 1px 3px rgba(0,0,0,.1);
}
.navbar .search-1 .form-control {
    border: 1px solid #ccc;
    /* box-shadow: inset 0 1px 2px rgba(0,0,0,0.3); */
    /* -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3); */
    outline: none;
    background-color: #fff;
    font-size: 14px;
    height: 29px;
    line-height: 30px;
    margin: 0 0 2px;
    overflow: hidden;
    position: relative;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -moz-transition: border-color .2s ease;
    -webkit-transition: border-color .2s ease;
    transition: border-color .2s ease;
    width: 280px;
    top: -66px;
}
</style>
<script src="js/custom.js"></script> 
</html>
 