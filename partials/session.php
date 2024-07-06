<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select id, username, firstname, lastname, civil_status, gender from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $id_session = $row['id'];
   $login_session = $row['username'];
   $name_session =  $row['lastname'];
   $gender_session = $row['gender'];
   $civ_stat_session = $row['civil_status'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>