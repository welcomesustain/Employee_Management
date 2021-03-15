<?php
    include '../session.php';
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
    echo "</p>connection succesfull</p>";
    }
   
    if(isset($_POST['send']))
    {
        echo "how am i doing";
        $name = $_POST['emp_name'];
        $msg = $_POST['msg'];
        $date = date('y-m-d h:i:s');
    
        echo $name.$msg.$date.$login_session;

     $sql_insert = mysqli_query($conn,"INSERT INTO emp_message(emp_name,emp_message,created_date)
    VALUES ('$login_session','$msg','$date') ");
    
    if($sql_insert){
        echo "<p>Success</p>";
    }
    else{
        echo mysqli_error($conn);
        exit;
    }
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Hello, world!</title>
  </head>
  <body>

  <div class="container" id="center" >
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
           
     <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="emp_name" id="exampleInputEmail1" placeholder="name here" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
        <button type="submit" name="send" class="btn btn-primary">Submit</button>
            
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>

  </div>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
