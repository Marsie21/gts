<?php
	include("session.php");

    $current_url = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Alumni Tracer</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" type="text/css" href="css/app.css"/>
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- FONT AWESOME -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <!-- Croppie CSS -->
        <link rel="stylesheet" type="text/css" href="css/croppie.css" />

    </head>
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h4 style="color: #fff">National<b>University</b></h4>
                </div>

                <ul class="list-unstyled components">
                    <li>
                    	<a <?php echo $current_url === "/gts/admin.php" ? 'class="active"' : ""; ?> href="admin.php" ><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a>
                    </li>
                    <li class="">
                        <a <?php echo $current_url === "/gts/alumni-list.php" ? 'class="active"' : ""; ?> href="alumni-list.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Alumni List</a>
                    </li>
                    <li>
                        <a <?php echo $current_url === "/gts/events.php" ? 'class="active"' : ""; ?> href="events.php" id="events"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Events</a>
                    </li>
                    <li>
                        <a href="feedbacks.php" <?php echo $current_url === "/gts/feedbacks.php" ? 'class="active"' : ""; ?>><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Feedbacks <span class="count-feedbacks" style="float: right; background: red; padding: 2.5px; border-radius: 60px; font-size: 14px; font-weight: bolder;"></span></a>
                    </li> 
                </ul>

                <ul class="list-unstyled CTAs">
                    <li><a href="logout.php" class="logout">Logout</a></li>
                </ul>
            </nav>

            <header id="header-primary">
            	<nav class="navbar navbar-default fixed-top">
                    <div class="container-fluid">
                        <div class="form-group">
						    <p> Welcome <?php echo $name_session; ?></p>
					    </div>
                        
					    <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Hide Sidebar</span>
                            </button>
                        </div>
                    </div>
                </nav>
            </header>