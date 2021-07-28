<?php
// adding security
require "includes/security.php";
// database
require "includes/db.php";

// form data
if (empty($_GET['id'])) {
    echo "<script> alert('Please select a item first.!!') </script>";
    echo "<script> location = 'load-unload-history.php' </script>";
}else{
    $lu_id = mysqli_escape_string($con, $_GET['id']);

    // load unload history by lu_id
    $sql = mysqli_query($con, "SELECT * FROM load_unload WHERE lu_id = '$lu_id' ");
    $row = mysqli_fetch_assoc($sql);
}

    // updating the LU data
    if (isset($_POST['update'])) {
        $total_fare = $row['total_fare'];
        $paid_fare = $_POST['paid_fare'];
        $due_fare = $total_fare - $paid_fare;

echo "Total fare: $total_fare <br> Paid fare: $paid_fare <br> Due fare: $due_fare";

        $new_sql = mysqli_query($con, "UPDATE load_unload SET paid_fare = '$paid_fare', due_fare = '$due_fare'  WHERE lu_id = '$lu_id' ");

        if ($new_sql) {

            echo "<script> location = 'load-unload-history.php' </script>";
        }else{
            echo "<script> alert('OOPS...!!!! Try Again') </script>";
            echo "<script> location = 'load-unload-history.php' </script>";
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
                                        <input name="car_number" type="text" class="form-control" value="<?= $row['car_number'] ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>লোড স্থান</label>
                                        <input name="load_l" type="text" class="form-control" value="<?= $row['load_l'] ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>আনলোড স্থান</label>
                                        <input name="unload_l" type="text" class="form-control" value="<?= $row['unload_l'] ?>" disabled>
                                    </div>

                                    <!-- Current date will be added in data submission -->

                                    <div class="form-group">
                                        <label>মোট ভাড়া</label>
                                        <input name="total_fare" type="number" class="form-control" value="<?= $row['total_fare'] ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>পরিশোধ</label>
                                        <input name="paid_fare" type="number" class="form-control" value="<?= $row['paid_fare'] ?>" requried>
                                    </div>

                                    <!-- বাকি column will be added in data submission -->

                                    <div class="form-group">
                                        <input name="update" type="submit" value="Update" class="btn btn-success">
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