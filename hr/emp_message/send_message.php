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
    
    }


   
    if(isset($_POST['send']))
    {
        $to_emp = $_POST['to_emp'];
        $msg = $_POST['msg'];
        $date = date('y-m-d h:i:s');
        $emp_id = $row['emp_id'];
        $to_emp_id=$_POST['emp_id'];

        
        $sel = "SELECT emp_id, first_name FROM employee_info WHERE first_name='$to_emp' and  emp_id='$to_emp_id'";
        $res = $conn->query($sel);
        
        if ($res->num_rows > 0) {
          // output data of each row
          while($row = $res->fetch_assoc()) {
            
            $to_emp_id = $row["emp_id"];

            if($to_emp=="Admin"){
            
              $sql_insert = mysqli_query($conn,"INSERT INTO emp_message(emp_name,emp_id,emp_message,created_date)
              VALUES ('$login_session','$emp_id','$msg','$date')");
              echo "sent to Admin";
              
          }else{
              
           $sql_insert = mysqli_query($conn,"INSERT INTO emp_message2(emp_id,from_emp,to_emp_id,to_emp,date_created,emp_message)
           VALUES ('$emp_id','$login_session','$to_emp_id','$to_emp','$date','$msg') ");
               echo "<b style='color:green;' >Sent to employee </b>";
          }
  
        }
        } else {
          echo "<b style='color:red;' >Employee not found </b>" ;
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
    <link rel="stylesheet" href="msg.css">
    <title>Hello, world!</title>
  </head>
  <body>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form method="post">
        <h1>Send message </h1>
        
        <fieldset>
          <label for="name">TO:</label>
          <input type="text" id="name" name="to_emp">
        
          <label for="email">Employee ID:</label>
          <input type="text" id="mail" name="emp_id">
      
        </fieldset>
        <fieldset>  
        
          
         <label for="bio">Message:</label>
          <textarea id="bio" name="msg"></textarea>
         </fieldset>
       
        <button type="submit" name="send">Send</button>
        
       </form>
        </div>
      </div>

      
    <hr />
<a <?php 
if($login_session=="Admin"){echo "href='../welcome.php'"; }
else{echo "href='../welcome_emp.php'";} ?> class="btn ">
    Back
</a>
      
    </body>
</html>

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
