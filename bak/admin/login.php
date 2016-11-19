<?php
include "../DB_connection/connection.php";
$vb_db = new Database();
$con = $vb_db->connect('debateplus');
session_start();
/*$doLogout="";*/
if(isset($_GET['login'])){
    $loginStatus= $_REQUEST['login'];
}else{
    $loginStatus="success";
}/*
if(isset($_SESSION['userId'])){
    $doLogout=True;
    $userId=$_SESSION['userId'];
}else{
    $userId="";
}
$_SESSION["userName"] = '';
$_SESSION["roleName"] = '';
unset($_SESSION['userId']);
unset($_SESSION['loggedIn']);*/

?>
    <!DOCTYPE html>
    <html >
    <head>
        <meta charset="utf-8">
        <title>Video Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="LoginPage/css/normalize.css">

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>



    <div class="CRM_login_wrapper">
        <!--<h1 class="title">Login</h1>-->
<!--        <p class="CRM_login_logo"><img src="../images/dp-logo. crm.png"/></p>
-->        <form id="login_form" class="CRM_login" method = "post" action ="LoginPage/checkLogin.php">
            <img src="../images/250x200.png" style="width: 100%; height: 115px;"/>
            <input type="text" name ="userName" placeholder="Username" id="Username" value="" required="required" autofocus/>
            <i class="fa fa-user"></i>
            <input type="password" placeholder="Password" name ="password" id="Password" value="" required="required"/>
            <i class="fa fa-key"></i>

            <button>
                <i class="spinner"></i>
                <div class="button-container">
                    <input type ="submit" name ="submit" id="CRM_login_blck" value="Login" />
                </div>
            </button>

        </form>
    </div>
    </body>
    </html>


<?php mysqli_close($con);?>
<script>
    jQuery(document).ready(function(){

        var login= '<?php echo $loginStatus?>';

        if(login=="failed"){
            alert("Please enter the correct credentials");
        }

    });

</script>
