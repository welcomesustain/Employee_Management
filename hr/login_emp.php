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
      
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $key="max";
      $encrypted_pass =sha1($key.$_POST['password']);

      $sql = "SELECT emp_id,first_name FROM employee_info WHERE email ='".$myemail."' and emp_password = '".$encrypted_pass."'";
      $result = mysqli_query($db,$sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $myusername=$row["first_name"];
        }
      
      
      }else{echo $myemail."person not found";}
      
      
      
      
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      //$active = $row['emp_id'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	  $error="this is the error";
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         if($myusername == "Admin"){
             echo "<script type='text/javascript'> alert('Please login as Admin');</script>";
            header("location: Login_page.php");
         }
         else{
          header("location: welcome_emp.php"); 
        }
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
<body style="background-image:url('images/login.jpg'); background-size:cover;opacity: 1.9; margin-top:35px;">
<h1>
  <div class='d-flex justify-content-center'>EMPLOYEE  LOGIN PAGE </div>

</h1>

<div class='container'>
<form action="" name="signin" method='POST'>
  <div class="form-group" >
    <label for="name">email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
  </div>

  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
  </div>
<!--<input type="submit" class="btn btn-primary" value="Sign in" name="signin">-->
<button type="submit" class="btn btn-success" value="Sign in" name="signin">Sign in</button>

</form>
<br /> 
<div class="row" >
not employee... <a href="Login_Page.php">Admin Login </a>
</div>
<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

<!--<h6>Not a user? <a href='register.html'>register here</a></h6>-->

</div>
</body>
</html> 