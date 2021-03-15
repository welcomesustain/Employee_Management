<!DOCTYPE html>
<html>


<head>
</head>
<div class='container'>
<body>
<div class="container">
    <div class="row">
        <?php 

        //processing leave request
        $id = $_GET['id'];
        echo $id;
        $name=$_GET['name'];
        $status =$_GET['status'];
        $emp_id2 = $_GET['emp_id'];
        echo $emp_id2;
        include_once 'connection.php';
        include 'session.php';

        if($status=="approved"){
            $days=$_GET['days'];
            echo $days."it is approved <br/>";
            $msg = "Leave approved";
            $date = date('y-m-d h:i:s');
        
            echo $name.$id.$status.$emp_id2;
    // sending approved response to employee
         $sql_insert = mysqli_query($conn,"INSERT INTO emp_message2(emp_id,from_emp,to_emp_id,to_emp,date_created,emp_message)
        VALUES ('$id','$login_session','$emp_id2','$name','$date','$msg') ");
        $sql_update = mysqli_query($conn,"UPDATE leave_app SET msg_status=1 WHERE leave_id=$id and emp_id='$emp_id2' and emp_name='$name' ");
        echo "success<br/>";



        // updating leave days
        

        $sql_update2 = mysqli_query($conn,"UPDATE employee_info SET leave_days=leave_days-$days WHERE emp_id=$emp_id2 and first_name='$name' ");
        echo "sending to Application sent";
        echo $days;
    
        if($sql_insert || $sql_update2){ echo "<p>Success sending</p>";}else{echo mysqli_error($conn);exit;}
        header('location:leave_requests.php');

        }else{

            echo "how am i doing2";
            $msg = "Leave Denied";
            $date = date('y-m-d h:i:s');



            $sql_insert = mysqli_query($conn,"INSERT INTO emp_message2(emp_id,from_emp,to_emp_id,to_emp,date_created,emp_message)
            VALUES ('$id','$login_session','$emp_id2','$name','$date','$msg') ");

            $sql_update = mysqli_query($conn,"UPDATE leave_app SET msg_status=1 WHERE leave_id=$id and emp_id='$emp_id2' and emp_name='$name' ");
            
            if($sql_insert){
                echo "<p>Success</p>";
            }
            else{
                echo mysqli_error($conn);
                exit;
            }

            header('location:leave_requests.php');


        }
        
        $sql = "UPDATE emp_message SET msg_status=1 WHERE id=$id";
        if($conn -> query($sql) === TRUE){
            echo "Successful";
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
        echo $row["emp_message"];
        ?>
        <div>From: <?php echo $row['emp_name'] ?></div>
        

        
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
