<?php 
    include '../connection.php';
    include '../session.php';

    $msg_id = $_GET['msg_id'];
    echo $msg_id; 


    $sql = "DELETE FROM emp_message2 WHERE msg_id='$msg_id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
header('location:index.php');
?>