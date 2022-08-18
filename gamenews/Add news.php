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
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter title" name="title">
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <input type="text" class="form-control" placeholder="Enter text" name="text">
                </div>
                <div>
                    <input style="margin-top: 15px" type="file" name="my_image">
                    <input style="margin-top: 15px" type="submit" name="submit" value="Upload">
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 20px">Submit</button>
            </form>
        </div>
    </body>
</html>
