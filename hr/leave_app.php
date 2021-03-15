
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="leave_app.css">
    <title>Leave application</title>
</head>
<body>
    <div class="container-fluid cent mx-auto">
<h1>Leave Application</h1>


<div class="cont">
<form action="" name="apply" method='POST' class="leave_form">
<div class="container" id="center" >
   
  <div class="form-group">
    <label for="last_name">Reason</label>
    <input type="text" name="reason" class="form-control reason" id="exampleInputPassword1" placeholder="Reason For Leave" required>
  </div>
  <div class="form-group">
    <label for="email" name="job_title">number of days</label>
    <input type="number" name="days" placeholder="number of days" > 
    </div>

<input type="submit" class="btn btn-primary" value="Apply" name="apply">

</form>
</div>
</div>


<hr />
<a href="welcome_emp.php" class="btn btn-block">
    Back to Dashboard
</a>

<?php 
        include 'connection.php';

        include 'session.php';
        $ses_sql2 = mysqli_query($db,"select leave_days,overtime from employee_info where first_name = '$user_check' ");
        $row2 = mysqli_fetch_array($ses_sql2,MYSQLI_ASSOC);
    
        $leave_days = $row2['leave_days'];
        $overtime_pay = $row2['overtime'];

echo "<br/>";

if (isset($_POST['apply']))
{

$reason = $_POST["reason"];
$days = $_POST["days"];
;
$day = 0;
$int_days = (int)$days;
$day = $leave_days - $int_days;



//echo $name.$last_name.$email.$job_title.$password.$confirm_password;
if( $leave_days ==0){
    echo "<b style='color:red;'>No leave days available</b>";
}elseif ($day<0){
    echo "<b style='color:red;'>Please select valid days</b>";
}else{
    
    //$sql = "INSERT INTO employee_info (first_name, last_name, email, job_title, emp_password,income)
    //VALUES ('$name', '$last_name', '$email','$job_title', '$password', '$income')";
    $date = date('y-m-d h:i:s');
    $sql_insert = mysqli_query($conn,"INSERT INTO leave_app(emp_id,emp_name,leave_days,date_created)
    VALUES ('$emp_id','$login_session','$days','$date') ");
    echo "sending to Application sent";
   
if($sql_insert){
   echo "<p>Success</p>";
}
else{
   echo mysqli_error($conn);
   exit;
}
$conn->close();
}



}


?>
</div>
</body>
</html>