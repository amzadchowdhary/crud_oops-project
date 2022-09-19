<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <?php
        
        
        if(isset($_SESSION['email'])){
            echo '<title>Welcome-'.$_SESSION['email'].'</title>';
        }else{
            echo '<title>Album of Ads</title>';
        }
        ?>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <div class="collapse bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">About</h4>
                            <p class="text-muted">Do Follow us for more services.</p>
                            <p class="lead text-muted">Help us to feature your Ads in our page..!</p>
                            <p class="lead text-muted">Below are some Ads from our beloved users!</p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Contact</h4>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                                <li><a href="#" class="text-white">Like on Facebook</a></li>
                                <li><a href="#" class="text-white">Email me</a></li>
                                <?php
                                if(isset($_SESSION['email'])){
                                    echo '<li><a href="index.php" class="btn btn-secondary my-2">Logout</a></li>';
                                }else{
                                    echo '<li><a href="signin.php" class="btn btn-secondary my-2">SignIN</a></li>';
                                    echo '<li><a href="signup.php" class="btn btn-primary my-2">SignUp</a></li>';
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true"
                            class="me-2" viewBox="0 0 24 24">
                            <path
                                d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                            <circle cx="12" cy="13" r="4" />
                        </svg>
                        <strong>Album of Ads</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>

        <main>
            <?php
            if(isset($_SESSION['email'])){
            echo'<section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Album of Ads</h1>                        
                        Welcome -';
                        
                        echo $_SESSION['email'];
                        
                    echo'<p class="lead text-muted">Help us to feature your Ads in our page..!</p>
                         <p class="lead text-muted">Below are some Ads from our beloved users!</p>
                          Fill the below form for your Ad.<br>
                         <a href="advertise.php" class="btn btn-secondary my-2">Publish here</a>
                    </div>
                </div>
                </section>';}
            ?>
            <div class="album py-5 bg-light">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        if(isset($_SESSION['email'])){
                        include "userads.php";
                        $user_email=$_SESSION['email'];
                        $userads=new Userads();
                        $userads->ads($user_email);
                        }else{
                        include "ads.php";
                        $ads=new Ads();
                        $ads->userAds();
                        }
                        ?>
                    </div>
                </div>
            </div>

        </main>

        <footer class="text-muted py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1">Album of Ads is &copy; Amzad</p>
                <p class="mb-0">New to Album of Ads? <a href="index.php">Visit the homepage</a> or read our <a
                        href="#">getting started guide</a>.</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
    </body>

</html>