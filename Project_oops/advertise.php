<?php
            session_start();
            if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
              header("location: index.php");
              exit;
            }else{
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Advertisement</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>

        <div class="container mb-5 mt-5">
            <h><b>Advertisement</b> For Album Ads.</h>
            <form method="POST" action="insertads.php" enctype="multipart/form-data">
                <div class="row">
                    <div>Title : </div>
                    <input type="text" name="title" placeholder="Enter Advertisement Title" maxlength="50" size="50"
                        required>
                    <?php echo'<input type="hidden" name="user_email" value="'.$_SESSION['email'].'">';?>
                </div>

                <div class="row">
                    <div>Description : </div>
                    <textarea name="description" maxlength="150" placehoder="Enter Advertisement Description Here"
                        cols="39" required></textarea>
                </div>
                <div class="row">
                    <div>Banner Image : </div>
                    <input type="file" name="banner_image" required>
                </div>
                <div class="row mt-3">
                    <input type="submit" name="submit_add" value="Add Advertisement">
                </div>
            </form>
        </div>
    </body>

</html>
<?php
}
?>