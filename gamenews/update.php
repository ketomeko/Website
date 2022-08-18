<?php
include 'Connection.php';
$id = $_GET['updateid'];
if (isset($_POST['submit'])) {
    $title=$_POST['title'];
    $text=$_POST['text'];

    $sql = "update `news` set set id='$id',title='$title',text='$text'";
    $result = mysqli_query($con,$sql);
    if ($result) {
        //echo "Data inserted";
        header("location: Admin Panel.php");
    }
    else {
        die(mysqli_error($con));
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css">

    <title>Add News</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label>Text</label>
            <input type="text" class="form-control" placeholder="Enter text" name="text">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>

