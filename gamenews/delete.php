<?php
    include 'Connection.php';
    if (isset($_GET['deleteid'])) {
        $id=$_GET['deleteid'];

        $sql="delete from `news` where id = $id";
        $result=mysqli_query($con,$sql);
        if ($result){
            //echo "Deleted successfull";
            header("location: Admin Panel.php");
        }
        else {
            die(mysqli_error($con));
        }
    }
?>
