<?php 
    include 'connection.php';
    include 'session.php';

    //getting the details of employee
    $ses_sql2 = mysqli_query($db,"select leave_days,overtime from employee_info where first_name = '$user_check' ");
   
    $row2 = mysqli_fetch_array($ses_sql2,MYSQLI_ASSOC);
    
    $leave_days = $row2['leave_days'];
    $overtime_pay = $row2['overtime'];
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
      echo "0 results for messages";
      }

    ?>
<!DOCTYPE html>
<html>


<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css" >
  <link rel="stylesheet" type="text/css" href="footer.css" >
</head>

<body>
<div class='container'>
  <!-- The navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Welcome: <?php echo $login_session ?></a>
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
        <a class="nav-link" href="emp_message/send_message.php">Send Email</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="employee_info.php">Employee info</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="far fa-envelope"></i><span class="badge badge-danger" id="count" style="border-radius: 50%; position:relative;top:-10px;left:-10px;">
        
        <?php echo $unread_messages2 ?> </span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="emp_message/">View</a></li>
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


   

<h1>

DASHBOARD
</h1>
<div class='row details' >
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Number of employees</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " ".$number_of_emp ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-briefcase"></i>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Leave_days available</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " ".$leave_days ?></div>
                                            <a href="leave_app.php">apply for leave</a>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-briefcase"></i>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>		


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Overtime Due to you</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " ".$overtime_pay; ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-briefcase"></i>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Marketing</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " ".$marketing ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-briefcase"></i>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
</div>
<br />

<hr />

<footer>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#portfolio">Portfolio</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

<hr/>
  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">An HRMS, or human resources management system, is a suite of software applications used to manage human resources and related processes throughout the employee lifecycle. An HRMS enables a company to fully understand its workforce while staying compliant with changing tax laws and labor regulations</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li>*University of Limpopo</li>
              <li>*This is A system which should be managed by an admin</li>
              <li>*Human resource management is a central pillar of many organizations</li>
    
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Languages Used</h6>
            <ul class="footer-links">
              <li>PHP</li>
              <li>HTML</li>
              <li>CSS</li>
              <li>JAVASCRIPT</li>
              <li></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a href="#">Group 32</a>.
            </p>
          </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
