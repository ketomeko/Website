<?php
    include 'connection.php';
?>
<html>
    <head>
        <title>Admin Panel</title>
        <meta charset="UTF-8" name="viewport" content="width = device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css">
    </head>
    <body>
        <div class="container">
            <button class="btn btn-primary my-5"><a href="Add%20news.php" class="text-light" style="text-decoration: none">Add News</a></button>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Text</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Operations</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sql="SELECT * FROM news ORDER BY news.ID DESC";
                    $result = mysqli_query($con,$sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['ID'];
                            $title = $row['Title'];
                            $text = $row['Text'];
                            $pic = $row['Img'];
                            echo ' <tr> 
                            <th scope="row">' .$id. '</th>
                            <td>' .$title. ' </td>
                            <td>' .$text. ' </td>
                            <td><img src="./uploads/'.$pic.'" style="width: 150px"></td>
                            <td>
                            <button class="btn btn-primary"><a class="text-light" style="text-decoration: none" href="update.php?updateid='.$id.'">UPDATE</a></button>
                            <button class="btn btn-danger"><a class="text-light" style="text-decoration: none" href="delete.php?deleteid='.$id.'">DELETE</a></button>
                            </td>
                            </tr>';
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
        <!--
        <form method="POST">
            <button name="Logout">Logout</button>
        </form>

        <?php
        /*
            if(isset($_POST['Logout']))
            {
                session_destroy();
                header("location: Admin Login.php");
            }
        */
        ?>

        -->
    </body>
</html>
