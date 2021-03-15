<?php include '../session.php'; ?>
<?php 
    include '../connection.php';

    $sql3 = "SELECT msg_status
    FROM emp_message2 WHERE to_emp='$login_session' and to_emp_id='$emp_id'";
    $result10 = $conn->query($sql3);
    $unread_messages2 = 0;
    if(!empty($result10) && $result10->num_rows > 0) {
      // output data of each row
    
      while($row = $result10->fetch_assoc()) {
       // echo "id: " . $row["emp_id"]. " - Name: " . $row["name"]. " " . $row["last_name"]. "<br>";
       if($row['msg_status'] == 0){
         $unread_messages2++;
         //echo $unread_messages;
       }
      
      }
    } else {
      echo "0 results";
      }




    ?>
<!DOCTYPE html>
<html>


<head>
  <title>Meassages</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css" >
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
    <a class="navbar-brand" href="../welcome_emp.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="">HR managements system </a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Aboutt</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="all_employees.php">List Employees</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="far fa-envelope"></i><span class="badge badge-danger" id="count" style="border-radius: 50%; position:relative;top:-10px;left:-10px;">
        
        <?php echo $unread_messages2;?> </span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">mark all as read</a></li>
            
          
          </ul>
        </li>
      </ul>
      <span class="navbar-text">
      <a href = "../logout.php">Sign Out</a>
    </span>
    </div>

  </div>
</nav>
<div class="container table1"></div>
<div class="row">
  
  <h1>Unread</h1>
</div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">From</th>
      <th scope="col">from</th>
      <th scope="col">Read message</th>
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
   
   
    $s_no = 0;
   
    $sql_get = mysqli_query($conn,"SELECT * FROM emp_message2 WHERE msg_status= 0 and to_emp= '$login_session' and to_emp_id=$emp_id");
    while($main_result = mysqli_fetch_assoc($sql_get)) :?>

<tr>
<th scope="row"><?php echo $main_result['emp_id'] ?></th>
      <td> <?php echo $main_result['from_emp'] ?></td>
      <td> <?php echo '<a class="text-primary" href="read_msg.php?id='.$main_result['msg_id'].'&emp='.$main_result['from_emp'].'">View message</a>'?></td>
      <td> <?php echo $main_result['date_created'] ;?></td>
      <td> <?php echo '<a class="text-primary" href="delete_msg.php?msg_id='.$main_result['msg_id'].'"><i class="fas fa-archive"></i></a></a>'?></td>
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
      <th scope="col">Message ID</th>
      <th scope="col">From</th>
      <th scope="col">Read message</th>
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
   
    $s_no = 0;
    $sql_get = mysqli_query($conn,"SELECT * FROM emp_message2 WHERE msg_status= 1 and to_emp_id='$emp_id' and to_emp= '$login_session'");
    while($main_result = mysqli_fetch_assoc($sql_get)) :?>

<tr>
<th scope="row"><?php echo $main_result['msg_id']; ?></th>
      <td> <?php echo $main_result['from_emp'] ?></td>
      <td> <?php echo '<a class="text-primary" href="read_msg.php?id='.$main_result['msg_id'].'&emp='.$main_result['from_emp'].'">View message</a>'?></td>
      <td> <?php echo $main_result['date_created'] ;?></td>
      <td> <?php echo '<a class="text-primary" href="delete_msg.php?msg_id='.$main_result['msg_id'].'"><i class="fas fa-archive"></i></a></a>'?></td>
    </tr>
    <?php endwhile ?>
</table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>


