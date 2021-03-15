<?php include 'session.php'; ?>
<?php 
    include 'connection.php';
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Welcome <?php echo $login_session ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">HR managements system </a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="leave_requests.php">Leave Requests</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="emp_message/send_message.php">send Message</a>
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
        
        <?php echo $admin_messages ?> </span>
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


   

<h1>
Welcome: 

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
                                                ICT Departments</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " ".$ict ?></div>
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
                                                Acountancy</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " ".$accounting ?></div>
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
                            <a href="#about">About group 32</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#portfolio">About Company </a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Infinito Web Design Studio 2015. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

<hr/>

  <!-- Site footer -->
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
              <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
              <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
              <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
              <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
              <li><a href="http://scanfcode.com/category/android/">Android</a></li>
              <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/about/">About Us</a></li>
              <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
              <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
              <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
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
