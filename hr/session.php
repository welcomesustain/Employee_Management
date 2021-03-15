<?php
   //creating a sesstion for logged in user
      define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'employee');
   
   
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select emp_id,first_name from employee_info where first_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['first_name'];
   $emp_id = $row['emp_id'];
      
   if(!isset($_SESSION['login_user'])){
      header("location:Login_Page.php");
      die();
   }
?>