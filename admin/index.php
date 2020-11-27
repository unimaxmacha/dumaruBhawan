<?php

 // Initialize the session
  session_start();

	// Check if the user is logged in, if not then redirect him to login page.
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
		header("location: login.php");
		exit;
	}

	$module  =  isset($_REQUEST['m']) ? $_REQUEST['m'] : '';
	$container  =  isset($_REQUEST['p']) ? $_REQUEST['p'] : 'dashboardContent';

	include 'includes/config.php';
	include 'includes/helpers.php';

  
?>
<!DOCTYPE html>
<html lang="en">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>U3Service - Admin Dashboard</title>
  <?php include 'pages/common/headerScript.php'; ?>
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include 'pages/common/topNavBar.php'; ?>

      <?php include 'pages/common/asideNavBar.php'; ?>
      <!-- Main Content -->
      <div class="main-content">

        <?php 
          if(empty($module)) {
            include_once('pages/common/'.$container.".php");
          }
          else {
            include_once('pages/mod_'.$module.'/'.$container.".php");
          }
        ?>
        <?php include 'pages/common/settingPanel.php'; ?>
      </div>
      <?php include 'pages/common/footerCopyRight.php'; ?>
    </div>
  </div>
  <?php include 'pages/common/footerScript.php'; ?>
</body>
</html>