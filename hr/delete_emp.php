<?php 
 include 'connection.php';
 include 'session.php';


$emp_id= $_GET['emp_id'];
echo $emp_id;

$sql = "DELETE FROM employee_info WHERE emp_id='$emp_id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


header('location:all_employees.php');

?>