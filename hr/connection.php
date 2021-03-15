<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  //echo "</p>connection succesfull</p>";
}


$sql = "SELECT emp_id, first_name, last_name, email, job_title, income,leave_days,
overtime FROM employee_info";
$result = $conn->query($sql);
$number_of_emp = 0;
$ict = 0;
$accounting = 0;
$marketing = 0;
$lawyer = 0;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $person = $row["first_name"];
   // echo "id: " . $row["emp_id"]. " - Name: " . $row["name"]. " " . $row["last_name"]. "<br>";
   $number_of_emp ++;
  $dep = $row["job_title"];
  $t = date("H");

if ($dep =='Market') {
$marketing++;} 
elseif ($dep=='accountant') {
  $accounting++;
}
elseif($dep=='ICT'){$ict++;}
 else {
	$lawyer++;
}
  }
} else {
  echo "0 results";
  }

  $sql2 = "SELECT id, emp_name, emp_message, msg_status,created_date
  FROM emp_message";
  $result2 = $conn->query($sql2);
  $unread_messages = 0;
  $admin_messages = 0;
  $emp_name = 0;
  $message = 0;
  $msg_status = 0;
  $created_date = 0;
  
  if(!empty($result2) && $result2->num_rows > 0) {
    // output data of each row
  
    while($row = $result2->fetch_assoc()) {
     // echo "id: " . $row["emp_id"]. " - Name: " . $row["name"]. " " . $row["last_name"]. "<br>";
     if($row['msg_status'] == 0){
       $admin_messages++;
       //echo $unread_messages;
     }
    
    }
  } else {
    echo "0 results";
    }

    $sql3 = "SELECT msg_status
    FROM emp_message2 ";
    $result10 = $conn->query($sql3);
    $unread_messages2 = 0;
    $emp_name = 0;
    $message = 0;
    $msg_status = 0;
    $created_date = 0;
    
    if(!empty($result10) && $result10->num_rows > 0) {
      // output data of each row
    
      while($row = $result10->fetch_assoc()) {
       // echo "id: " . $row["emp_id"]. " - Name: " . $row["name"]. " " . $row["last_name"]. "<br>";
       if($row['msg_status'] == 0){
         $unread_messages++;
         //echo $unread_messages;
       }
      
      }
    } else {
      echo "0 results";
      }


 
?> 
