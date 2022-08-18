<?php
    require("Connection.php");
?>
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8" name="viewport" content="width = device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    </head>
    <body>
        <div class="login-form">
            <h2>ADMIN LOGIN</h2>
            <form method="POST">
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="AdminName">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="AdminPassword">
                </div>
                <button name="Signin">Login</button>
            </form>
        </div>
        <?php
            if (isset($_POST['Signin'])) {
                $query= "SELECT * FROM admin_login WHERE Admin_Name='$_REQUEST[AdminName]' AND Admin_Password='$_REQUEST[AdminPassword]'";
                $result=mysqli_query($con,$query) or die(mysqli_error());
                if (mysqli_num_rows($result)){
                    session_start();
                    $_SESSION['AdminLoginId']=$_POST['AdminName'];
                    header("location: Admin Panel.php");
                }
                else {
                    echo "<script>alert('Incorrect Information')</script>";
                }
            }
        ?>
    </body>
</html>
