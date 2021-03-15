<?php 
include 'connection.php';
include 'session.php';

$leave_id = $_GET['leave_id'];
echo $leave_id; 


$sql = "DELETE FROM leave_app WHERE leave_id='$leave_id'";

if ($conn->query($sql) === TRUE) {
echo "Record deleted successfully";
} else {
echo "Error deleting record: " . $conn->error;
}
header('location:leave_requests.php');
?>


