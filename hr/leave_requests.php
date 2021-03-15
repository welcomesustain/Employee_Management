
<?php
    include "connection.php";
    include 'session.php'; ?>
<!DOCTYPE html>
<html>


<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--<link rel="stylesheet" type="text/css" href="style.css" >-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<div class='container'>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="welcome.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">HR managements system </a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_employee.php">Add Employee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="all_employees.php">List Employees</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="far fa-envelope"></i><span class="badge badge-danger" id="count" style="border-radius: 50%; position:relative;top:-10px;left:-10px;">
        
          <?php echo $admin_messages; ?>  </span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="messages/">View</a></li>  
          <li><hr class="dropdown-divider"></li>

            <li><a class="dropdown-item" href="#">mark all as read</a></li>
            
          
          </ul>
        </li>
      </ul>
      <span class="navbar-text">
      <a href = "logout.php">Sign Out</a>
    </span>
    </div>

  </div>
</nav>
<div class="container table1"></div>
<div class="row">
  <h1>Pending Leave requests</h1>
  <br>
</div>

<!-- Displaying pending leaves -->
<table class="table">
  <thead>
    <tr>
    <th scope="col">employee ID</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Days Taken</th>
      <th scope="col">Day Available</th>
      <th scope="col">Aprove/Deny</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $s_no = 0;
    $sql_get = mysqli_query($conn,"SELECT * FROM leave_app  WHERE msg_status= 0");
    
    
    while($main_result = mysqli_fetch_assoc($sql_get)) :?>

<?php 
$res =  $main_result["emp_id"];
echo $res;
$sql_days = "SELECT leave_days FROM employee_info WHERE emp_id=$res"; 
$result = $conn->query($sql_days);
while($row = $result->fetch_assoc()) {
   $leave_avail= $row["leave_days"] ;
   echo $leave_avail;
}

?>


<tr>
  <!-- printing row by row -->
<th scope="row"><?php echo $main_result['emp_id'] ?></th>
      <td> <?php echo $main_result['emp_name'] ?></td>
      <td> <?php echo $main_result['leave_days'] ;?></td>
      <td><?php if($leave_avail>$main_result['leave_days']){echo "<b style='color:green;'>".$leave_avail."</b> ";} 
                else{echo "<b style='color:red;'>".$leave_avail."</b> ";}  ?></td>
      <td> <?php echo '<a class="btn btn-primary" href="leave_process.php?id='.$main_result['leave_id'].'&emp_id='.$main_result['emp_id'].'&name='.$main_result['emp_name'].'&days='.$main_result['leave_days'].'&status=approved'.'">Approve</a>'?>
           <?php echo '<a class="btn btn-primary" href="leave_process.php?id='.$main_result['leave_id'].'&emp_id='.$main_result['emp_id'].'&name='.$main_result['emp_name'].'&status=denied'.'">Reject</a>'?>
     </td>
      <td> <?php echo ""; echo '<a class="btn btn-primary" href="leave_delete.php?leave_id='.$main_result['leave_id'].'"><i class="fas fa-archive"></i></a>'; ?> <?php '<a class="btn btn-primary" href="leave_process.php?id='.$main_result['leave_id'].'>Delete</a>'?> </td>
    </tr>
    <?php endwhile ?>
</table>
<br />
<hr />
<div class="row">
  <h1>Read</h1>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">employee ID</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Days Taken</th>
      <th scope="col">response</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    echo "something";
    $s_no = 0;
    $sql_get = mysqli_query($conn,"SELECT * FROM leave_app WHERE msg_status= 1");
    while($main_result = mysqli_fetch_assoc($sql_get)) :?>

<tr>
<th scope="row"><?php echo $main_result['emp_id']; ?></th>

      <td> <?php echo $main_result['emp_name'] ?></td>
      <td> <?php echo $main_result['leave_days'] ;?></td>
      <td> <?php echo $main_result['leave_days'];?></td>
      <td> <?php echo $main_result['date_created'] ;?></td>
      <td> <?php echo ""; echo '<a class="btn btn-primary" href="leave_delete.php?leave_id='.$main_result['leave_id'].'"><i class="fas fa-archive"></i></a>'; ?> <?php '<a class="btn btn-primary" href="leave_process.php?id='.$main_result['leave_id'].'>Delete</a>'?> </td>
    </tr>
    <?php endwhile ?>
</table>

<a <?php echo "href='welcome.php'";  ?> class="btn ">Go Back</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>


