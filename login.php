<?php
// getting database connection
require "includes/db.php";
// geting user login form data
    if (isset($_POST['login'])) {
        $email = mysqli_escape_string($con, $_POST['email']);
        $password = mysqli_escape_string($con, $_POST['password']);
        $mdpass = md5($password);

        // getting user login data from database
        $sql = mysqli_query($con, "SELECT * FROM user WHERE email ='$email' AND password = '$mdpass' ");

        // matching user given data to stored data

        if (mysqli_num_rows($sql) <= 0 ) {
            echo "<script> alert('Email or Password did not matched..!!!!') </script>";
            echo "<script> location = 'login.php' </script>";
        }else{
            session_start();
            $_SESSION['user_pass'] = $mdpass;
            // getting user id
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['user_id'] = $row['u_id'];
            
            echo "<script> location = 'index.php' </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login | Small Shop</title>
        <!-- Vendor styles -->
        <link rel="stylesheet" href="resources/vendors/zwicon/zwicon.min.css">
        <link rel="stylesheet" href="resources/vendors/animate.css/animate.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="resources/css/app.min.css">
    </head>

    <body data-sa-theme="1">
        <div class="login">

            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <i class="zwicon-user-circle"></i>
                    Hi there! Please Sign in

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zwicon-more-h actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="#">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="login__block__body" action="#" method="post">
                    <div class="form-group">
                        <input name="email" type="email" class="form-control text-center" placeholder="Email Address" required>
                    </div>

                    <div class="form-group">
                        <input name="password" type="password" class="form-control text-center" placeholder="Password" required>
                    </div>

                    <button name="login" type="submit" class="btn btn-theme btn--icon"><i class="zwicon-checkmark"></i></button>
                </form>
            </div>


            <!-- Forgot Password -->
            <div class="login__block" id="l-forget-password">
                <div class="login__block__header">
                    <i class="zwicon-user-circle"></i>
                    Forgot Password?

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zwicon-more-h actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="#">Login</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <p class="mb-5">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

                    <div class="form-group">
                        <input type="text" class="form-control text-center" placeholder="Email Address">
                    </div>

                    <a href="index.html" class="btn btn-theme btn--icon"><i class="zwicon-checkmark"></i></a>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="resources/vendors/jquery/jquery.min.js"></script>
        <script src="resources/vendors/popper.js/popper.min.js"></script>
        <script src="resources/vendors/bootstrap/js/bootstrap.min.js"></script>

        <!-- App functions and actions -->
        <script src="resources/js/app.min.js"></script>
    </body>

</html>