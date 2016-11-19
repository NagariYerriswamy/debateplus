
<?php
session_start();
if(!isset($_SESSION['userName'])){
    header("Location: http://" . $_SERVER['SERVER_NAME'] . "/admin/login.php");

}
//echo $_SESSION['userName'];
include_once('../DB_connection/connection.php');
$videoBlogDb = new Database();
$con1= $videoBlogDb->connect('debateplus');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Debateplus</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--custom CSS-->
    <link href="../css/customStyle.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form id="uploadVideo" method="post" action="videoUpdate.php" enctype="multipart/form-data" role="form">
                        <?php $selectQuery="select * from category";
                        $selResult=mysqli_query($con1,$selectQuery);?>
                        <div class="form-group">
                            <label for="catId">Category</label>
                            <select class="form-control" name="catId"  id="catId" multiple="multiple" required>
                                <?php while($catRow=mysqli_fetch_assoc($selResult)):?>
                                    <option selected="" value="<?php echo $catRow['cat_id']?>"><?php echo $catRow['cat_name'];?></option>
                                <?php endwhile;?>
                            </select>
                        </div>
                            <div class="form-group">
                            <label for="name" required>Name</label>
                            <input type="text" class="form-control" rows="5" id="modal_vName" name="modal_vName" required/>
                        </div>
                        <input type="hidden" class="form-control" rows="5" id="modal_vId" name="modal_vId"/>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="5" id="modal_description" name="modal_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="selCat">Selected Categories</label>
                            <textarea class="form-control" rows="5" id="modal_selCat" name="selCat" readonly></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Update" name="update"/>
                        </div>
                    </form>

                </div>
                <div class="modal-footer custom">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="index.html">SB Admin v2.0</a>-->
            <a class="navbar-brand" href="index.html"><img src="../images/250x200.png" style="height:45px;top:3px;position:absolute;" alt="Debateplus" ></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <!--<li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        &lt;!&ndash; /input-group &ndash;&gt;
                    </li>-->
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a onclick="redirect(this)" page_link="createCat.php" class="active"><i class="fa fa-plus" aria-hidden="true"></i>&#160;&#160; Create Category</a>
                    </li>
                   <!-- <li>
                        <a onclick="showList()"><i class="fa fa-list fa-fw"></i>Video List</a>
                    </li>-->
                    <!--<li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris.js Charts</a>
                            </li>
                        </ul>
                        &lt;!&ndash; /.nav-second-level &ndash;&gt;
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="panels-wells.html">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="icons.html"> Icons</a>
                            </li>
                            <li>
                                <a href="grid.html">Grid</a>
                            </li>
                        </ul>
                        &lt;!&ndash; /.nav-second-level &ndash;&gt;
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                &lt;!&ndash; /.nav-third-level &ndash;&gt;
                            </li>
                        </ul>
                        &lt;!&ndash; /.nav-second-level &ndash;&gt;
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i>Media<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                                <a href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                            <li>
                                <a href="../fileUpload">Upload Video</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    <!--
                                        </li>
                    -->
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper" class="pageContent">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row" id="content">
            <!-- <div class="col-lg-3 col-md-6">
                 <div class="panel panel-primary">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-comments fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                                 <div class="huge">26</div>
                                 <div>New Comments!</div>
                             </div>
                         </div>
                     </div>
                     <a href="#">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-green">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-tasks fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                                 <div class="huge">12</div>
                                 <div>New Tasks!</div>
                             </div>
                         </div>
                     </div>
                     <a href="#">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-yellow">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-shopping-cart fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                                 <div class="huge">124</div>
                                 <div>New Orders!</div>
                             </div>
                         </div>
                     </div>
                     <a href="#">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>-->
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3" onclick="upload()">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php
                                $dir = "test_upload";
                                $videoCount=0;
                                // Open a directory, and read its contents
                                if (is_dir($dir)){
                                    if ($dh = opendir($dir)){

                                        while (($file = readdir($dh)) !== false){
                                               //var_dump($file);
                                           // echo "filename:" . $file . "<br>";
                                            $videoCount++;

                                        }
                                        closedir($dh);
                                    }

                                }
                                $videoCount=$videoCount-2;?>
                                <div class="huge"><?php echo $videoCount;?></div>
                                <div>Videos</div>
                            </div>
                        </div>
                    </div>
                    <!--<a href="">-->
                        <div class="panel-footer">
                            <span class="pull-left">Upload Videos</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    <!--</a>-->
                </div>
                <?php


error_reporting(1);


//var_dump($_POST['upd']);
extract($_POST); 
 var_dump($_POST);

$target_dir = "test_upload/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//var_dump($_POST);

     
         $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	$thumbdata = $_POST['thumbdata'];
         if($_POST['upd']){
		//echo "data---".$_POST['thumbdata'];
	
			 if ($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg") {
             $op = "File Format Not Suppoted";
         } else {

             $video_path = $_FILES['fileToUpload']['name'];
/*------------------------------generate thumbnail begins-----------------------------*/			
			$thumbnail_path = 'admin/test_upload/thumbnail/';
				$second             = 1;
				$thumbSize       = '150x150';
				 
				// Video file name without extension(.mp4 etc) 
				$videoname  = $vName;
				 $ffmpeg_installation_path='/usr/local/bin/ffmpeg';
				// FFmpeg Command to generate video thumbnail
				 
			/*	$cmd = "{$ffmpeg_installation_path} -i {$video_file_path} -deinterlace -an -ss {$second} -t 00:00:01  -s {$thumbSize} -r 1 -y -vcodec mjpeg -f mjpeg {$path_to_store_generated_thumbnail} 2>&1";
				 
				exec($cmd, $output, $retval);
				 
				if ($retval)
				{
					var_dump($retval); 
					echo 'error in generating video thumbnail';
				}
				else
				{
					echo 'Thumbnail generated successfully';
					echo $thumb_path = $thumbnail_path . $videoname . '.jpg';
				}
				/*------------------------------generate thumbnail begins-----------------------------*/			
		
		
		//list($type, $data) = explode(';', $data);
		//list(, $data)      = explode(',', $data);
		//$data = base64_decode($data);
		$tdata = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $thumbdata));
		$thumb_name= 'thumb_'.str_replace(" ","_",$vName).'.png';
		file_put_contents('test_upload/thumbnail/'.$thumb_name, $tdata);

             $jsonCatId=json_encode($catId);
             /*        mysql_query("insert into video(video_name) values('$video_path')");*/
             echo $insertQuery = "insert into video(file_name,video_name,description,category,thumbnail,link_type) values('$video_path','$vName','$description','$jsonCatId','$thumb_name','file');";

             $result = mysqli_query($con1, $insertQuery);

             move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

             $op = "uploaded ";
			 

         }
		 if(isset($_POST['youtubeId'])){
		 $jsonCatId=json_encode($catId);
		 echo $insertQuery = "insert into video(file_name,video_name,description,category,thumbnail,link_type) values('$youtubeId','$vName','$description','$jsonCatId','$thumb_name','youtube');";
		  $result = mysqli_query($con1, $insertQuery);
		  $op = "youtube Link uploaded";
		 }
		 }
     
     //echo $op;
               

//display all uploaded video

/*if($disp)

{

    $query=mysql_query("select * from video");

    while($all_video=mysql_fetch_array($query))

    {
        */?><!--

        <video width="300" height="200" controls>
            <source src="test_upload/<?php /*echo $all_video['video_name']; */?>" type="video/mp4">
        </video>

    --><?php /*} } */?>

<?php $selectQuery="select * from category";
$selResult=mysqli_query($con1,$selectQuery);?>
                 
				 <label></label> 
                 <label></label> 
                <form id="uploadVideo1"  method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" role="form">
                    
					<h2>Upload Video</h2>
                    
                    <div class="form-group">	
                        <label>Select Type Of Video</label>					
						<div class="radio">
						  <label><input type="radio" value="file_upload" name="optradio">File Upload</label>
						</div>
						<div class="radio">
						  <label><input type="radio" value="youtube_link" name="optradio">Youtube Link</label>
						</div>
					<div>
					<div class="form-group">
                        <label for="catId">Category</label>
                        <select class="form-control" name="catId[]" multiple="multiple" required>
                            <?php while($catRow=mysqli_fetch_assoc($selResult)):?>
                                <option value="<?php echo $catRow['cat_name']?>"><?php echo $catRow['cat_name'];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" required>Name</label>
                        <input type="text" class="form-control" rows="5" id="vName" name="vName" required/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                    </div>
					<div class="form-group" id ="yTubeId">
                        <label for="youtubeId" required>Youtube Video Id</label>
                        <input type="text" class="form-control" rows="5" id="youtubeId" name="youtubeId" required/>
                    </div>
				<input type="file" name="fileToUpload" id="fileToUpload"/>
                         <br>
			<input type="hidden" id="thumbdata" name="thumbdata" value="" /> 
			<div id="thumnail_img"> </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Uplaod Video" name="upd"/>
                    </div>
                </form>

            </div>
        </div>
        <!---------------------------Video List Starts------------------------>
        <?php $dir = "test_upload";
		
		?>


        <div class="row" id="videoList">
            <h2>Video List</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>S.no</th>
                    <th>Video Name</th>
                    <th>File Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
               <?php
               $counter=0;
               $selectQuery="select * from video";
               $res=mysqli_query($con1,$selectQuery);
               ?>
               <?php while($resRow=mysqli_fetch_array($res)):?>
                    <?php $counter++;?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $resRow['video_name'] ?></td>
                                    <td><?php echo $resRow['file_name'] ?></td>
                                    <td><?php echo $resRow['description'] ?></td>
                                    <td><button type="button" vName="<?php echo $resRow['video_name'];?>" fName="<?php echo $resRow['file_name']; ?>" des="<?php echo $resRow['description']; ?>" vId="<?php echo $resRow['id'];?>" category='<?php echo $resRow['category'];?>' class="btn btn-submit" onclick="updateVideo(this)" data-toggle="modal" data-target="#myModal">Update</button> </td>
                                    <td><button type="button" vName="<?php echo $resRow['video_name'];?>" fName="<?php echo $resRow['file_name']; ?>" class="btn btn-danger" onclick="delVideo(this)">Delete</button> </td>
                                </tr>
               <?php endwhile;?>

                </tbody>
            </table>
        </div>
    </div>
        <!-- /.row -->
        <!-- <div class="row">
             <div class="col-lg-8">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                         <div class="pull-right">
                             <div class="btn-group">
                                 <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                     Actions
                                     <span class="caret"></span>
                                 </button>
                                 <ul class="dropdown-menu pull-right" role="menu">
                                     <li><a href="#">Action</a>
                                     </li>
                                     <li><a href="#">Another action</a>
                                     </li>
                                     <li><a href="#">Something else here</a>
                                     </li>
                                     <li class="divider"></li>
                                     <li><a href="#">Separated link</a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     &lt;!&ndash; /.panel-heading &ndash;&gt;
                     <div class="panel-body">
                         <div id="morris-area-chart"></div>
                     </div>
                     &lt;!&ndash; /.panel-body &ndash;&gt;
                 </div>
                 &lt;!&ndash; /.panel &ndash;&gt;
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                         <div class="pull-right">
                             <div class="btn-group">
                                 <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                     Actions
                                     <span class="caret"></span>
                                 </button>
                                 <ul class="dropdown-menu pull-right" role="menu">
                                     <li><a href="#">Action</a>
                                     </li>
                                     <li><a href="#">Another action</a>
                                     </li>
                                     <li><a href="#">Something else here</a>
                                     </li>
                                     <li class="divider"></li>
                                     <li><a href="#">Separated link</a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     &lt;!&ndash; /.panel-heading &ndash;&gt;
                     <div class="panel-body">
                         <div class="row">
                             <div class="col-lg-4">
                                 <div class="table-responsive">
                                     <table class="table table-bordered table-hover table-striped">
                                         <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>Date</th>
                                             <th>Time</th>
                                             <th>Amount</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <tr>
                                             <td>3326</td>
                                             <td>10/21/2013</td>
                                             <td>3:29 PM</td>
                                             <td>$321.33</td>
                                         </tr>
                                         <tr>
                                             <td>3325</td>
                                             <td>10/21/2013</td>
                                             <td>3:20 PM</td>
                                             <td>$234.34</td>
                                         </tr>
                                         <tr>
                                             <td>3324</td>
                                             <td>10/21/2013</td>
                                             <td>3:03 PM</td>
                                             <td>$724.17</td>
                                         </tr>
                                         <tr>
                                             <td>3323</td>
                                             <td>10/21/2013</td>
                                             <td>3:00 PM</td>
                                             <td>$23.71</td>
                                         </tr>
                                         <tr>
                                             <td>3322</td>
                                             <td>10/21/2013</td>
                                             <td>2:49 PM</td>
                                             <td>$8345.23</td>
                                         </tr>
                                         <tr>
                                             <td>3321</td>
                                             <td>10/21/2013</td>
                                             <td>2:23 PM</td>
                                             <td>$245.12</td>
                                         </tr>
                                         <tr>
                                             <td>3320</td>
                                             <td>10/21/2013</td>
                                             <td>2:15 PM</td>
                                             <td>$5663.54</td>
                                         </tr>
                                         <tr>
                                             <td>3319</td>
                                             <td>10/21/2013</td>
                                             <td>2:13 PM</td>
                                             <td>$943.45</td>
                                         </tr>
                                         </tbody>
                                     </table>
                                 </div>
                                 &lt;!&ndash; /.table-responsive &ndash;&gt;
                             </div>
                             &lt;!&ndash; /.col-lg-4 (nested) &ndash;&gt;
                             <div class="col-lg-8">
                                 <div id="morris-bar-chart"></div>
                             </div>
                             &lt;!&ndash; /.col-lg-8 (nested) &ndash;&gt;
                         </div>
                         &lt;!&ndash; /.row &ndash;&gt;
                     </div>
                     &lt;!&ndash; /.panel-body &ndash;&gt;
                 </div>
                 &lt;!&ndash; /.panel &ndash;&gt;
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                     </div>
                     &lt;!&ndash; /.panel-heading &ndash;&gt;
                     <div class="panel-body">
                         <ul class="timeline">
                             <li>
                                 <div class="timeline-badge"><i class="fa fa-check"></i>
                                 </div>
                                 <div class="timeline-panel">
                                     <div class="timeline-heading">
                                         <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                         <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                                         </p>
                                     </div>
                                     <div class="timeline-body">
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
                                     </div>
                                 </div>
                             </li>
                             <li class="timeline-inverted">
                                 <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                                 </div>
                                 <div class="timeline-panel">
                                     <div class="timeline-heading">
                                         <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                     </div>
                                     <div class="timeline-body">
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem quibusdam, tenetur commodi provident cumque magni voluptatem libero, quis rerum. Fugiat esse debitis optio, tempore. Animi officiis alias, officia repellendus.</p>
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                                 </div>
                                 <div class="timeline-panel">
                                     <div class="timeline-heading">
                                         <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                     </div>
                                     <div class="timeline-body">
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
                                     </div>
                                 </div>
                             </li>
                             <li class="timeline-inverted">
                                 <div class="timeline-panel">
                                     <div class="timeline-heading">
                                         <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                     </div>
                                     <div class="timeline-body">
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="timeline-badge info"><i class="fa fa-save"></i>
                                 </div>
                                 <div class="timeline-panel">
                                     <div class="timeline-heading">
                                         <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                     </div>
                                     <div class="timeline-body">
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus modi quam ipsum alias at est molestiae excepturi delectus nesciunt, quibusdam debitis amet, beatae consequuntur impedit nulla qui! Laborum, atque.</p>
                                         <hr>
                                         <div class="btn-group">
                                             <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                 <i class="fa fa-gear"></i>  <span class="caret"></span>
                                             </button>
                                             <ul class="dropdown-menu" role="menu">
                                                 <li><a href="#">Action</a>
                                                 </li>
                                                 <li><a href="#">Another action</a>
                                                 </li>
                                                 <li><a href="#">Something else here</a>
                                                 </li>
                                                 <li class="divider"></li>
                                                 <li><a href="#">Separated link</a>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="timeline-panel">
                                     <div class="timeline-heading">
                                         <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                     </div>
                                     <div class="timeline-body">
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi fuga odio quibusdam. Iure expedita, incidunt unde quis nam! Quod, quisquam. Officia quam qui adipisci quas consequuntur nostrum sequi. Consequuntur, commodi.</p>
                                     </div>
                                 </div>
                             </li>
                             <li class="timeline-inverted">
                                 <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i>
                                 </div>
                                 <div class="timeline-panel">
                                     <div class="timeline-heading">
                                         <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                     </div>
                                     <div class="timeline-body">
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati, quaerat tempore officia voluptas debitis consectetur culpa amet, accusamus dolorum fugiat, animi dicta aperiam, enim incidunt quisquam maxime neque eaque.</p>
                                     </div>
                                 </div>
                             </li>
                         </ul>
                     </div>
                     &lt;!&ndash; /.panel-body &ndash;&gt;
                 </div>
                 &lt;!&ndash; /.panel &ndash;&gt;
             </div>
             &lt;!&ndash; /.col-lg-8 &ndash;&gt;
             <div class="col-lg-4">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <i class="fa fa-bell fa-fw"></i> Notifications Panel
                     </div>
                     &lt;!&ndash; /.panel-heading &ndash;&gt;
                     <div class="panel-body">
                         <div class="list-group">
                             <a href="#" class="list-group-item">
                                 <i class="fa fa-comment fa-fw"></i> New Comment
                                     <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                     </span>
                             </a>
                             <a href="#" class="list-group-item">
                                 <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                     <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                     </span>
                             </a>
                             <a href="#" class="list-group-item">
                                 <i class="fa fa-envelope fa-fw"></i> Message Sent
                                     <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                     </span>
                             </a>
                             <a href="#" class="list-group-item">
                                 <i class="fa fa-tasks fa-fw"></i> New Task
                                     <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                     </span>
                             </a>
                             <a href="#" class="list-group-item">
                                 <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                     <span class="pull-right text-muted small"><em>11:32 AM</em>
                                     </span>
                             </a>
                             <a href="#" class="list-group-item">
                                 <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                     <span class="pull-right text-muted small"><em>11:13 AM</em>
                                     </span>
                             </a>
                             <a href="#" class="list-group-item">
                                 <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                     <span class="pull-right text-muted small"><em>10:57 AM</em>
                                     </span>
                             </a>
                             <a href="#" class="list-group-item">
                                 <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                     <span class="pull-right text-muted small"><em>9:49 AM</em>
                                     </span>
                             </a>
                             <a href="#" class="list-group-item">
                                 <i class="fa fa-money fa-fw"></i> Payment Received
                                     <span class="pull-right text-muted small"><em>Yesterday</em>
                                     </span>
                             </a>
                         </div>
                         &lt;!&ndash; /.list-group &ndash;&gt;
                         <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                     </div>
                     &lt;!&ndash; /.panel-body &ndash;&gt;
                 </div>
                 &lt;!&ndash; /.panel &ndash;&gt;
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                     </div>
                     <div class="panel-body">
                         <div id="morris-donut-chart"></div>
                         <a href="#" class="btn btn-default btn-block">View Details</a>
                     </div>
                     &lt;!&ndash; /.panel-body &ndash;&gt;
                 </div>
                 &lt;!&ndash; /.panel &ndash;&gt;
                 <div class="chat-panel panel panel-default">
                     <div class="panel-heading">
                         <i class="fa fa-comments fa-fw"></i>
                         Chat
                         <div class="btn-group pull-right">
                             <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                 <i class="fa fa-chevron-down"></i>
                             </button>
                             <ul class="dropdown-menu slidedown">
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-refresh fa-fw"></i> Refresh
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-check-circle fa-fw"></i> Available
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-times fa-fw"></i> Busy
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-clock-o fa-fw"></i> Away
                                     </a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     &lt;!&ndash; /.panel-heading &ndash;&gt;
                     <div class="panel-body">
                         <ul class="chat">
                             <li class="left clearfix">
                                     <span class="chat-img pull-left">
                                         <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                     </span>
                                 <div class="chat-body clearfix">
                                     <div class="header">
                                         <strong class="primary-font">Jack Sparrow</strong>
                                         <small class="pull-right text-muted">
                                             <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                         </small>
                                     </div>
                                     <p>
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                     </p>
                                 </div>
                             </li>
                             <li class="right clearfix">
                                     <span class="chat-img pull-right">
                                         <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                     </span>
                                 <div class="chat-body clearfix">
                                     <div class="header">
                                         <small class=" text-muted">
                                             <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                         <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                     </div>
                                     <p>
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                     </p>
                                 </div>
                             </li>
                             <li class="left clearfix">
                                     <span class="chat-img pull-left">
                                         <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                     </span>
                                 <div class="chat-body clearfix">
                                     <div class="header">
                                         <strong class="primary-font">Jack Sparrow</strong>
                                         <small class="pull-right text-muted">
                                             <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                     </div>
                                     <p>
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                     </p>
                                 </div>
                             </li>
                             <li class="right clearfix">
                                     <span class="chat-img pull-right">
                                         <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                     </span>
                                 <div class="chat-body clearfix">
                                     <div class="header">
                                         <small class=" text-muted">
                                             <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                         <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                     </div>
                                     <p>
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                     </p>
                                 </div>
                             </li>
                         </ul>
                     </div>
                     &lt;!&ndash; /.panel-body &ndash;&gt;
                     <div class="panel-footer">
                         <div class="input-group">
                             <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                 <span class="input-group-btn">
                                     <button class="btn btn-warning btn-sm" id="btn-chat">
                                         Send
                                     </button>
                                 </span>
                         </div>
                     </div>
                     &lt;!&ndash; /.panel-footer &ndash;&gt;
                 </div>
                 &lt;!&ndash; /.panel .chat-panel &ndash;&gt;
             </div>
             &lt;!&ndash; /.col-lg-4 &ndash;&gt;
         </div>-->
        <!-- /.row -->

    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery-1.9.1.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../bower_components/raphael/raphael-min.js"></script>
<!--<script src="../bower_components/morrisjs/morris.min.js"></script>
<script src="../js/morris-data.js"></script>-->

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<script>
    /*function showList(){
        jQuery.ajax({

            url:"bootstrap-datatable-php",
            success: function(response){
       //         console.log(response);
                jQuery("#content").html(response);
				jQuery("#example tbody tr").attr('onclick','showDetails()');
            }
        });

    }*/
    function delVideo(element){
        var fileName=jQuery(element).attr('fName');
        var vName=jQuery(element).attr('vName');
        jQuery.ajax({

            url:"delete.php?f="+fileName+"&&vName="+vName,
            success: function(response){
                        //location.reload();
                         console.log(response);
              }
        });
        //alert("test");
    }
    function updateVideo(element){
        jQuery("#modal_selCat").val('');
        jQuery('#catId option').each(function(i,sel){
            jQuery(this).prop('selected','');
        });
        var description=jQuery(element).attr('des');
        var vName=jQuery(element).attr('vName');
        var vId=jQuery(element).attr('vId');
        var  jsonCategories=jQuery(element).attr('category');
        if(!jsonCategories){
            jsonCategories='[""]';

        }
        console.log(jsonCategories);
        var categories=jQuery.parseJSON(jsonCategories);
        jQuery("#modal_vName").val(vName);
        jQuery("#modal_description").val(description);
        jQuery("#modal_vId").val(vId);
        jQuery("#modal_selCat").val(categories);
        jQuery('#catId option').each(function(i,sel){
            var option=jQuery(sel).text();
            if(jQuery.inArray(option,categories)!= -1){
                jQuery(this).prop('selected','selected');
            }
        });

    }

    jQuery("#catId").blur(function(){
        var selectedCat="";
        jQuery('#catId option:selected').each(function(i,sel){
        selectedCat=selectedCat+ "," +jQuery(sel).text();
        });
        selectedCat=selectedCat.substring(1);
        jQuery("#modal_selCat").val(selectedCat);

          console.log(selectedCat);

    });
	
	/*--------------------------- Save video start------------------------------*/
	function saveVideo(){
		event.preventDefault();
		var formData=jQuery("#uploadVideo1").serialize();
		console.log(formData);
		alert("test");
	} 
	
	/*--------------------------- Save video end------------------------------*/

</script>


<script>
//thumbnail generation script

document.getElementById('fileToUpload').addEventListener('change', function(event) {

  var file = event.target.files[0];
  var fileReader = new FileReader();
  if (file.type.match('image')) {
    fileReader.onload = function() {
      var img = document.createElement('img');
      img.src = fileReader.result;
      img.width = 265;
      document.getElementById('thumbdata').value = fileReader.result;
	//document.getElementsByTagName('div')[0].appendChild(img);
      document.getElementById('thumnail_img').appendChild(img);
    };
    fileReader.readAsDataURL(file);
    
  } else {
    fileReader.onload = function() {
      var blob = new Blob([fileReader.result], {type: file.type});
      var url = URL.createObjectURL(blob);
      var video = document.createElement('video');
      var timeupdate = function() {
        if (snapImage()) {
          video.removeEventListener('timeupdate', timeupdate);
          video.pause();
        }
      };
      video.addEventListener('loadeddata', function() {
        if (snapImage()) {
          video.removeEventListener('timeupdate', timeupdate);
        }
      });
      var snapImage = function() {
        var canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        var image = canvas.toDataURL();
        var success = image.length > 200000;
        if (success) {
          var img = document.createElement('img');
          img.src = image;
	  img.width = 265;
	  document.getElementById('thumbdata').value = image;
          //document.getElementsByTagName('div')[0].appendChild(img);
          document.getElementById('thumnail_img').appendChild(img);
          URL.revokeObjectURL(url);
        }
        return success;
      };
      video.addEventListener('timeupdate', timeupdate);
      video.preload = 'metadata';
      video.src = url;
      // Load video in Safari / IE11
      video.muted = true;
      video.playsInline = true;
      video.play();
    };
    fileReader.readAsArrayBuffer(file);
  }
});
jQuery("[name='optradio']").click(function(){
var selectedOpt = jQuery("[name='optradio']:checked").val();
jQuery("#uploadVideo1").show();

$("input[type=radio]").attr('disabled', true);
if(selectedOpt=="file_upload"){
	jQuery("#yTubeId").remove();
}else{ 
	jQuery("#fileToUpload").remove();
}
});

</script>
