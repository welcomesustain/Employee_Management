
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee";
 $conn = new mysqli($servername, $username, $password,$database);
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
$emp_id= $_GET['emp_id'];
echo $emp_id;

$sql = "SELECT * FROM employee_info WHERE emp_id='$emp_id'";

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
    
}
}
echo $name;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Update employee</title>
</head>
<body>
<div class="container-fluid cent mx-auto">
<h1> Update Employee <?php echo $name; ?></h1>
    <form action="update_process.php?emp_id=<?php echo $emp_id ?>" method="POST">
    <div class="form-group" >
    <label for="name">Old Name:</label>
    <label><strong><?php echo $name; ?></strong></label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New Name">
  </div>
  <div class="form-group">
    <label for="last_name">Old last_name</label>
    <label><strong><?php echo $surname; ?></strong></label>
    <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" placeholder="New Last name" >
  </div>
  <div class="form-group">
    <label for="email">old email</label>
    <label><strong><?php echo $email; ?></strong></label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="new email" >
</div>

<button type="submit" class="btn btn-success" name="update_user" value="Add User" >Update User</button>

    </form>

</div>
</body>
</html>