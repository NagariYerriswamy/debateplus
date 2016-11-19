<?php
	session_start();

    $userName = $_POST['userName'];
	$password = $_POST['password'];
	
    include("../../DB_connection/connection.php");
	$crm_db = new Database();
    $con = $crm_db->connect('debateplus'); // Connect to user db..

   echo $selectQuery = "SELECT user_name,role,password FROM user WHERE
                        password = '$password'
                        AND user_name='$userName'";
	
    $result = mysqli_query($con, $selectQuery);

    if (!$result)
	{
        die('Error in Query '. mysqli_error());
    }
    
	$resultRow = mysqli_fetch_array($result);
    
	// Storing login user name and role in session
	if($resultRow)
	{
		$_SESSION['userName'] = $resultRow['user_name'];
		$_SESSION['roleName'] = $resultRow['role'];
			header("Location: http://" . $_SERVER['SERVER_NAME'] . "/admin/index.php");
    }
	else
	{
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/admin/login.php?login=failed");
    }
	
    mysqli_close($con);
?>
