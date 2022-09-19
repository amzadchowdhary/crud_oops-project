<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>

        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
            integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="#">
        <style>
        .error {
            color: #FF0000;
        }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <h><b>Register</b> For Album of Ads</h>
            <div class="card">
                <div class="card-header">
                    <p class="login-box-msg">
                        <a href="signin.php" class="text-decoration-none">
                            If already registered please Signin here.
                        </a>

                    </p>
                </div>
                <div class="card-body register-card-body">
                    <p><span class="error">* required field</span></p>
                    <form method="POST" action="signupclass.php">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Full name">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">

                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">

                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="cpassword" placeholder="Retype password">

                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" name="submit" class="btn btn-dark btn-block">Register</button>
                            </div>
                            <div><a href="index.php" class="text-decoration-none">
                                    Back to Home Page
                                </a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </body>

</html>