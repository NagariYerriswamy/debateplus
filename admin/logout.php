<?php
/**
 * Created by PhpStorm.
 * User: nishant
 * Date: 07-06-2016
 * Time: 17:51
 */
session_start();
unset($_SESSION['userName']);
header("Location: http://" . $_SERVER['SERVER_NAME'] . "/admin/index.php");
//echo $_SESSION['userName'];