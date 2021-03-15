<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'employee');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   session_start();
   $error="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['name']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT emp_id FROM employee_info WHERE first_name = '$myusername' and emp_password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['emp_id'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	  $error="this is the error";
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         if($myusername != "Admin"){
          echo "<script type='text/javascript'> alert('Please login as employee');</script>";
         header("location: login_emp.php");}
         else{
          header("location: welcome.php");}
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<!DOCTYPE html>
<html>


<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="form.css">
<head>
<body>
<h1>
  <div class='d-flex justify-content-center'>ADMIN LOGIN PAGE </div>

</h1>


<div class='container'>
<form action="" name="signin" method='POST'>
  <div class="form-group" >
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
  </div>

  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
  </div>
<!--input type="submit" class="btn btn-primary" value="Sign in" name="signin">-->
<button type="submit" class="btn btn-success" value="Sign in" name="signin">Sign in</button>
</form>

<br /> 
<div class="row" >
<div style = "font-size:11px; color:#cc0000; margin-top:10px"><h4><?php echo $error; ?></h4></div>
<hr>
Not admin... <a href="login_emp.php"> Login here</a>
</div>



<!--<h6>Not a user? <a href='register.html'>register here</a></h6>-->

</div>
</body>
</html> 