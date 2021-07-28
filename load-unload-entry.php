<?php
// adding security
require "includes/security.php";
// database
require "includes/db.php";

// form data
if (isset($_POST['submit'])) {
    $car_number = mysqli_escape_string($con, $_POST['car_number']);
    $load_l = mysqli_escape_string($con, $_POST['load_l']);
    $unload_l = mysqli_escape_string($con, $_POST['unload_l']);
    $event_date = date('d/M/Y');
    $total_fare = mysqli_escape_string($con, $_POST['total_fare']);
    $paid_fare = mysqli_escape_string($con, $_POST['paid_fare']);
    $due_fare = $total_fare - $paid_fare;


// insert data into database
    $sql = mysqli_query($con, "INSERT INTO load_unload (car_number, load_l, unload_l, event_date, total_fare, paid_fare, due_fare, u_id) VALUES ('$car_number', '$load_l', '$unload_l', '$event_date', '$total_fare', '$paid_fare', '$due_fare', '$USERID') ");

    // checking if data inserted or not
    if ($sql) {
        
        echo "<script> location = 'load-unload-history.php' </script>";
    }else{
        echo "<script> alert('OOPS, Try Again....!!!!') </script>";
        echo "<script> location = 'load-unload-entry.php' </script>";
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
            <!-- Start side bar section -->
            <?php require "includes/sidebar.php"; ?>
            <!-- End side bar section -->
            <!-- Start custom theme section -->
            <?php require "includes/theme.php"; ?>
            <!-- End custom theme section -->

            <section class="content">
                <div class="content__inner">
                    <header class="content__title">
                        <h1>নতুন লোড/আনলোড লিখুন</h1>
                    </header>

                    <div class="card">
                        <div class="card-body">

                            <form action="#" method="post" class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>গাড়ির নাম্বার</label>
                                        <input name="car_number" type="text" class="form-control" placeholder="গাড়ির নাম্বার" required>
                                    </div>

                                    <div class="form-group">
                                        <label>লোড স্থান</label>
                                        <input name="load_l" type="text" class="form-control" placeholder="গাজীপুর/ঢাকা/নারায়ণগঞ্জ/......" requried>
                                    </div>

                                    <div class="form-group">
                                        <label>আনলোড স্থান</label>
                                        <input name="unload_l" type="text" class="form-control" placeholder="গাজীপুর/ঢাকা/নারায়ণগঞ্জ/......" required>
                                    </div>

                                    <!-- Current date will be added in data submission -->

                                    <div class="form-group">
                                        <label>মোট ভাড়া</label>
                                        <input name="total_fare" type="number" class="form-control" placeholder="মোট ভাড়া" required>
                                    </div>

                                    <div class="form-group">
                                        <label>পরিশোধ</label>
                                        <input name="paid_fare" type="number" class="form-control" placeholder="পরিশোধ" requried>
                                    </div>

                                    <!-- বাকি column will be added in data submission -->

                                    <div class="form-group">
                                        <input name="submit" type="submit" class="btn btn-success">
                                    </div>
                                    
                                </div>
                            </form>
  
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