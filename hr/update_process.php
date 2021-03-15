<?php
include_once "connection.php";
$name ="";
	$last_name = "";
	$email = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{ 
	$name = $_POST['name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
}

echo "the name is".$name;
$emp_id = $_GET['emp_id'];
echo $emp_id;

if($last_name !=""){
	$sql = "UPDATE employee_info SET first_name='$last_name' WHERE emp_id='$emp_id'";
	if ($conn->query($sql) === TRUE) {
		echo "<p>Record updated successfully</p>";
	  } else {
		echo "Error updating record: " . $conn->error;
	  }
	}

if($name !=""){
	$sql = "UPDATE employee_info SET first_name='$name' WHERE emp_id='$emp_id'";
	if ($conn->query($sql) === TRUE) {
		echo "<p>Name updated successfully</p>";
	  } else {
		echo "Error updating record: " . $conn->error;
	  }
	}

	if($email !=""){
		$sql = "UPDATE employee_info SET email='$email' WHERE emp_id='$emp_id'";
		if ($conn->query($sql) === TRUE) {
			echo "<p>Name updated successfully</p>";
		  } else {
			echo "Error updating record: " . $conn->error;
		  }
		}
		sleep(2);
		header('Location:all_employees.php');










?>