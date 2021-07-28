<?php
// adding security
require "includes/security.php";
// database
require "includes/db.php";


    // updating user information
    if (isset($_POST['update'])) {
        

        $name = mysqli_escape_string($con, $_POST['name']);
        $mobile = mysqli_escape_string($con, $_POST['mobile']);
        $address = mysqli_escape_string($con, $_POST['address']);
        $curr_pass_form = mysqli_escape_string($con, $_POST['curr_password']);
        $mdpass_curr = md5($curr_pass_form);
        $new_pass = mysqli_escape_string($con, $_POST['new_password']);
        $mdpass_new = md5($new_pass);
        $picture = $_FILES['picture']['name'];
        // getting old picture name
        $picSql = mysqli_query($con, "SELECT picture FROM user WHERE u_id = '$USERID' ");
        $picRow = mysqli_fetch_assoc($picSql);
        $oldPic = $picRow['picture'];
        if (empty($picture)) {
            $picture = $oldPic;
        }else{
            $picture = $_FILES['picture']['name'];
        }
        

        // checking if curr password matches or not
        $curr_pass_sql = mysqli_query($con, "SELECT password FROM user WHERE u_id = '$USERID' ");
        $curr_pass = mysqli_fetch_assoc($curr_pass_sql);
        $curr_pass = $curr_pass['password'];

        if ($curr_pass == $mdpass_curr) {
            $target = "upload/user_pictures/".basename($_FILES['picture']['name']);

            $userUpdateSql = "UPDATE user SET name = '$name',
                                              mobile = '$mobile',
                                              address = '$address', 
                                              password = '$mdpass_new', 
                                              picture = '$picture' 
                                              WHERE u_id = '$USERID' ";

            $runusersql = mysqli_query($con, $userUpdateSql);

            // moving CUSTOMER picture
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {
                $msg = 'Image uploaded';
            }else{
                $msg = 'Image did not uploaded';
            }

            if ($runusersql) {
                echo "<script> alert('Your information updated..!!!') </script>";
                // echo "<script> location = 'profile.php' </script>";
            }else{
                echo "<script> alert('Something is missing, Please try again..!!!') </script>";
                // echo "<script> location = 'profile.php' </script>";
            }
        }else{
            echo "<script> alert('Your old password did not matched. Try again..!!!') </script>";
            echo "<script> location = 'profile.php' </script>";
        }
    }


    // adding head section of project
    require "includes/head.php" ;
?>

    <body data-sa-theme="1">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <!-- Start top bar section -->
            <?php require "includes/topbar.php"; ?>
            <!-- End top bar section -->
            <?php  
            // adding current navigation marker
            $profile = 'navigation__active';
            ?>
            <!-- Start side bar section -->
            <?php require "includes/sidebar.php"; ?>
            <!-- End side bar section -->
            <!-- Start custom theme section -->
            <?php require "includes/theme.php"; ?>
            <!-- End custom theme section -->

            <section class="content">
                <div class="content__inner content__inner--sm">
                    <header class="content__title">
    <?php  
        $user_sql = mysqli_query($con, "SELECT * FROM user WHERE u_id = '$USERID' ");
        $row = mysqli_fetch_assoc($user_sql);
    ?>
                        <h1><?php echo $row['name'] ;?></h1>

                        <!-- <div class="actions">
                            <a href="#" class="actions__item zwicon-cog"></a>
                            <a href="#" class="actions__item zwicon-refresh-double"></a>

                            <div class="dropdown actions__item">
                                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Refresh</a>
                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                    <a href="#" class="dropdown-item">Settings</a>
                                </div>
                            </div>
                        </div> -->
                    </header>

                    <div class="card profile">
                        <div class="profile__img">
        <?php  
            $userPic = $row['picture'];
            if (empty($userPic)) {
        ?>
                            <img src="demo/img/logo.png" alt="">
        <?php }else{ ?>
                            <img src="upload/user_pictures/<?php echo $row['picture'] ;?>" alt="">
        <?php } ?>
                            <a href="#" class="zwicon-camera profile__img__edit"></a>
                        </div>

                        <div class="profile__info">

                            <ul class="icon-list">
                                <li><i class="zwicon-phone"></i>0<?php echo $row['mobile'] ;?></li>
                                <li><i class="zwicon-mail"></i><?php echo $row['email'] ?></li>
                                <li><i class="zwicon-chat"></i><?php echo $row['address'] ;?></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-body__title">Profile setting</h5>

                            <form action="#" method="post" class="row" enctype="multipart/form-data">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="User Name" value="<?php echo $row['name'] ;?>">
                                    </div>

                                    <div class="form-group">
                                        <label>User Mobile</label>
                                        <input name="mobile" type="number" class="form-control" placeholder="User Mobile Number" value="<?php echo $row['mobile'] ;?>">
                                    </div>

                                    <div class="form-group">
                                        <label>User Address</label>
                                        <input name="address" type="text" class="form-control" placeholder="User address" value="<?php echo $row['address'] ;?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input name="curr_password" type="password" class="form-control" placeholder="Current Password">
                                    </div>

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input name="new_password" type="password" class="form-control" placeholder="New Password">
                                    </div>

                                    <div class="form-group">
                                        <label>User Picture</label>
                                        <input name="picture" type="file" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input name="update" type="submit" class="btn btn-success" value="Update">
                                    </div>
                                    
                                </div>
                            </form>

                            <br>

                        </div>
                    </div>
                </div>

                <!-- Start footer section -->
                <?php require "includes/footer.php"; ?>
                <!-- End footer section -->
            </section>
        </main>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="resources/vendors/jquery/jquery.min.js"></script>
        <script src="resources/vendors/popper.js/popper.min.js"></script>
        <script src="resources/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script src="resources/vendors/overlay-scrollbars/jquery.overlayScrollbars.min.js"></script>

        <!-- App functions and actions -->
        <script src="resources/js/app.min.js"></script>
    </body>

</html>