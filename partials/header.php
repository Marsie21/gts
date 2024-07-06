<?php
    include('session.php');

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
                        <a href="home.php" <?php echo $current_url === "/gts/home.php" ? 'class="active"' : ""; ?> ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                    </li>
                    <li class="">
                        <a href='profile.php?id=<?Php echo $id_session; ?>' <?php echo $current_url === "/gts/profile.php?id=".$id_session ? 'class="active masterTooltip"' : 'class="masterTooltip"'; ?> ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Profile</a>
                    </li>
                    <li>
                        <a href="job-info.php?id=<?Php echo $id_session; ?>" <?php echo $current_url === "/gts/job-info.php?id=".$id_session ? 'class="active"' : ""; ?>><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Job Information</a>
                    </li>
                    <li>
                        <a href="send-feedback.php" <?php echo $current_url === "/gts/send-feedback.php" ? 'class="active"' : ""; ?>><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Send Feedback</a>
                    </li>
                    <li>
                        <a href="about_help.php" <?php echo $current_url === "/gts/about_help.php" ? 'class="active"' : ""; ?>><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About &amp; Help</a>
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
                            <p style='text-align: center'><b> Welcome <?php
                                if($gender_session === 'Female') {
                                    if($civ_stat_session === "Single"){
                                        echo "Ms. ".ucwords($name_session);
                                    } else {
                                        echo "Mrs. ".ucwords($name_session);
                                    }
                                } else {
                                    echo "Mr. ".ucwords($name_session);
                                }
                            ?></b></p>
            
                        </div>
                        <div class="navbar-header">
                            <ul class="nav" style="display: inline-block;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
                                    <ul class="dropdown-menu"></ul>
                                </li>
                            </ul>
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Hide Sidebar</span>
                            </button>
                        </div>
                    </div>
                </nav>
            </header>