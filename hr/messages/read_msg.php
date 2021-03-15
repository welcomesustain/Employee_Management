<?php include '../session.php'; ?>
<?php 
    include '../connection.php';
    ?>
<!DOCTYPE html>
<html>


<head>
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

<div class="container-fluid">
    <div class="row">
        <?php 
        $id = $_GET['id'];
        include_once '../connection.php';
        
        $sql = "UPDATE emp_message SET msg_status=1 WHERE id=$id";
        if($conn -> query($sql) === TRUE){
            
        }else{
            echo $conn ->error;
        }
        ?>

    </div>

    <div class="row">
        
    <?php
            $sql2 = "SELECT * FROM emp_message WHERE id=$id";
           
        $results = mysqli_query($conn,$sql2);
        $row =$results ->fetch_assoc();
        ?>        

  

        <div class="row">
        <div class="card">
  <h5 class="card-header">From: <?php echo $row['emp_name']."<br/>  ID: ".$row['emp_id'] ?></h5>
  <div class="card-body">
    <h5 class="card-title"><b>Message:</b></h5>

    <p class="card-text"><?php echo $row["emp_message"]; ?></p>
    <a href="./" class="btn btn-primary">Go Back</a>
  </div>
</div>
</div>
        

        
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
