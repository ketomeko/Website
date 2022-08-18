<?php
if (isset($_POST['submit']) && isset($_FILES['my_image'])){
    include "Connection.php";
    echo "<pre>";
    print_r($_FILES['my_image']);
    echo  "</pre>";

    $img_name=$_FILES['my_image']['name'];
    $img_size=$_FILES['my_image']['size'];
    $tmp_name=$_FILES['my_image']['tmp_name'];
    $error=$_FILES['my_image']['error'];
    $title=$_POST['title'];
    $text=$_POST['text'];

    if ($error === 0) {
        if ($img_size > 1500000) {
            $em = "Sorry, your file is too large";
            header("Location: Add news.php");
        }
        else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc= strtolower($img_ex);

            $allowed_exs = array("jpeg","jpg","png");

            if (in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = './uploads/'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);

                //Insert Database
                $sql = "INSERT INTO news(Title, Text, Img) VALUES ('$title', '$text', '$new_img_name')";
                mysqli_query($con, $sql);
                header("Location: Admin Panel.php");
            }
            else {
                $em = "You can't upload this file type.";
                header("Location: Add news.php");
            }
        }
    }

} else {
    $em = "unknown error occured.";
    header("Location: Add news.php");
}
?>
