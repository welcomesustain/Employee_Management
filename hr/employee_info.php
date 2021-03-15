the emp info

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee info
    </title>
</head>
<body>

<div class="container-fluid cent mx-auto">
<h1>  <div class='d-flex justify-content-center'> Employee Information </div></h1>
<div class="d-flex justify-content-end">
   </div>
<div class="d-flex justify-content-center">center</div>



  <?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "employee";
$conn = new mysqli($servername, $username, $password,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

include 'session.php';

//displaying employee information
$ses_sql = mysqli_query($db,"select emp_id, first_name, last_name, email, job_title, income,leave_days,
overtime from employee_info where first_name = '$user_check' ");
   
   $row2 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

     $id = $row2["emp_id"];
     $name = $row2["first_name"];
    $surname= $row2["last_name"];
    $email = $row2["email"];
    $dep = $row2["job_title"];
  ?>
<table class="table">
    <tbody>
        <tr>
          <th>ID</th>
            <td> <?php echo $id ?> </td>
          	<td>blank</td>
          	
        </tr>
        <tr>
          <th>First Name</th>
            <td> <?php echo $name ?> </td>
            <td></td>
          	
        </tr>
        <tr>
          <th>Last Name</th>
            <td><?php echo $surname; ?></td>
            <td></td>
            
        </tr>
      <tr>
          <th>Email</th>
          	<td><?php echo $email; ?></td>
            <td><a href="#"></a></td>
            
        </tr>
        <tr>
          <th>job_title</th>
          	<td><?php echo $dep; ?></td>
            <td></td>
            
        </tr>            
    </tbody>
</table>



<hr />
<a href="welcome_emp.php" class="btn btn-block">
    Back to Dashboard
</a>

</div>
</body>
</html>
    
</body>
</html>