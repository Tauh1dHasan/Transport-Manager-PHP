<?php
// adding security
require "includes/security.php";
// database
require "includes/db.php";

// getting id by get method
if (empty($_GET['id'])) {
    echo "<script> alert('Please select a customer first..!!!') </script>";
    echo "<script> location = 'customer-list.php' </script>";
}else{
    $curr_id = mysqli_escape_string($con, $_GET['id']);

    if (isset($_POST['save'])) {
        $customer_id = $curr_id;
        $action_date = date('d/M/Y');
        $product = mysqli_escape_string($con, $_POST['product']);
        $due = mysqli_escape_string($con, $_POST['due']);
        
        // get current balance
        $curr_blnce_sql = mysqli_query($con, "SELECT balance FROM due_payment WHERE customer_id = '$curr_id' ORDER BY dp_id DESC LIMIT 1 ");
        $curr_blnce = mysqli_fetch_assoc($curr_blnce_sql);
        $curr_blnce_amount = $curr_blnce['balance'];

        // new balance
        $new_blnce = $curr_blnce_amount - $due;

        $run_sql = mysqli_query($con, "INSERT INTO due_payment (customer_id, action_date, product, due, balance) VALUES ('$customer_id', '$action_date', '$product', '$due', '$new_blnce')");

        // checking if data inserted or not
        if (!$run_sql) {
            echo "<script> alert('Please try again..!!!') </script>";
            echo "<script> location = 'customer-list.php' </script>";
        }else{
            echo "<script> alert('Due amount added..!!') </script>";
            echo "<script> location = 'payment-history.php?id=$customer_id' </script>";
        }
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
                        <h1>Add new due entry</h1>
                    </header>

                    <div class="card">
                        <div class="card-body">

                            <form action="#" method="post" class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input name="product" type="text" class="form-control" placeholder="Purchased product name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input name="due" type="number" class="form-control" placeholder="Amount of money" required>
                                    </div>

                                    <div class="form-group">
                                        <input name="save" type="submit" class="btn btn-success" value="Save">
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