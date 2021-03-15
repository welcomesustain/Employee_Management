<?php 

        include 'connection.php';






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <title>Add Employee</title>
</head>
<body>

<div class="container-fluid cent mx-auto">
<h1> Add Employee</h1>

<?php 

include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

$name = $_POST["name"];
$last_name = $_POST["last_name"];
$email=$_POST["email"];
$job_title = $_POST["job_title"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$income = 0;


$sql_email = mysqli_query($conn, "SELECT count(*) as total from employee_info WHERE email = '".$email."'");

$row = mysqli_fetch_array($sql_email);
//echo $name.$last_name.$email.$job_title.$password.$confirm_password;
if( $password != $confirm_password){
    echo "<b style='color:red'>Password does not match!!!</b>";
}

elseif($row["total"]>0){
 echo "<b style='color:red;'>email already taken</b>"; ?>
	<script>
		alert('email already taken');
	</script>	
	<?php
}else{

     if($job_title =="ICT"){ $income=5000;}
     elseif($job_title =="Lawyer"){$income = 6000;}
     elseif ($job_title =="Accountant"){$income = 7000;}
     elseif ($job_title=="Marketing"){$income = 8000;}
    $key="max";
     $encrypted_pass =sha1($key.$password);

    $sql = "INSERT INTO employee_info (first_name, last_name, email, job_title, emp_password,income)
    VALUES ('$name', '$last_name', '$email','$job_title', '$encrypted_pass', '$income')";

if ($conn->query($sql) === TRUE) { echo "<b style='green:red'>New record created successfully</b>";} 
else {echo "Error: " . $sql . "<br>" . $conn->error;}

$conn->close();
}

}


?>








<form name="adduser" method='POST'>
  <div class="form-group" >
    <label for="name">name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="last_name">last_name</label>
    <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" placeholder="Last name" required>
  </div>
  <div class="form-group">
    <label for="email">email</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

</div>

  <div class="form-group">
    <label for="email" name="job_title">Job title</label>
    <select class="form-group" name="job_title">
          <option value="" selected>Choose option</option>
          <option value="ICT">ICT</option>
          <option value="Lawyer">Lawyer</option>
          <option value="Accountant">Accountant</option>
          <option value="Market">Marketing</option>
        </select>  
    </div>

  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="Password"> Confirm Password</label>
    <input type="password" name="confirm_password" class="form-control" id="confirmpassword" placeholder="Password"required>
  </div>
<button type="submit" class="btn btn-success" name="adduser" value="Add User" >Add User</button>
</form>



</div>

<hr />
<a href="welcome.php" class="btn btn-block">
    Back to Dashboard
</a>
</body>
</html>