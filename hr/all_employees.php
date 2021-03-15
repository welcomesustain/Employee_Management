


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All_employees
    </title>
</head>
<body>

<div class="container-fluid cent mx-auto">
<h1>  <div class='d-flex justify-content-center'> Employee List </div></h1>
<div class="d-flex justify-content-end">
    <a class="btn btn-primary" href="add_employee.php">Add Employee</a></div>
<div class="d-flex justify-content-center">center</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">surname</th>
      <th scope="col">email</th>
      <th scope="col">Job title</th>
      <th scope="col">Remove Employee </th>
      <th scope="col">Update Employee</th>


    </tr>
  </thead>
  <tbody>
  <?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "employee";
$conn = new mysqli($servername, $username, $password,$database);

$sql = "SELECT emp_id, first_name, last_name, email, job_title, income,leave_days,
overtime FROM employee_info";
$result = $conn->query($sql);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $person = $row["first_name"];
     // echo "id: " . $row["emp_id"]. " - Name: " . $row["name"]. " " . $row["last_name"]. "<br>";
     $id = $row["emp_id"];
     $name = $row["first_name"];
    $surname= $row["last_name"];
    $email = $row["email"];
    $dep = $row["job_title"];

echo

    "<tr>
      <th scope='row'>$id</th>
      <td>$name</td>
      <td> $surname</td>
      <td>$email</td>
      <td> $dep</td>
      <td><a href='delete_emp.php?emp_id=$id'><i class='fas fa-archive'></i></a> </td>
      <td><a href='update_emp.php?emp_id=$id'><i class='fas fa-user-edit'></i></a> </td>
    </tr>
    <tr>";
}
} else {
  echo "0 results";
  }

  ?>
  </tbody>
</table>


<hr />
<a href="welcome.php" class="btn btn-block">
    Back to Dashboard
</a>

</div>
</body>
</html>
    
</body>
</html>