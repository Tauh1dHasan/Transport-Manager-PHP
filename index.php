<?php
// adding security
require "includes/security.php";
// adding database connection
require "includes/db.php";
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
            $index = 'navigation__active';
            ?>
            <!-- Start side bar section -->
            <?php require "includes/sidebar.php"; ?>
            <!-- End side bar section -->
            <!-- Start custom theme section -->
            <?php require "includes/theme.php"; ?>
            <!-- End custom theme section -->

            <section class="content">
                <header class="content__title">
                    <h1>Dashboard <small></small></h1>

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

                <div class="row quick-stats">
                    

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
    <?php  
        $week_earn_sql = mysqli_query($con, "SELECT earn_amount FROM earn_expense WHERE action_date <= DATE(NOW()) - INTERVAL 7 DAY");
        $total_week_earn = 0;
        while ($week_earn = mysqli_fetch_assoc($week_earn_sql)) {
            $total_week_earn = $total_week_earn + $week_earn['earn_amount'];
        }
    ?>
                            <div class="quick-stats__info">
                                <h2>৳ <?php echo $total_week_earn ;?></h2>
                                <small>Last 7 days earning</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">4,7,6,2,5,3,8,6,6,4,8</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
    <?php  
        $month_earn_sql = mysqli_query($con, "SELECT earn_amount FROM earn_expense WHERE action_date <= DATE(NOW()) - INTERVAL 30 DAY");
        $total_month_earn = 0;
        while ($month_earn = mysqli_fetch_assoc($month_earn_sql)) {
            $total_month_earn = $total_month_earn + $month_earn['earn_amount'];
        }
    ?>
                            <div class="quick-stats__info">
                                <h2>৳ <?php echo $total_month_earn ;?></h2>
                                <small>Last 30 days earning</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">9,4,6,5,6,4,5,7,9,3,6</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
    <?php  
        $month_expense_sql = mysqli_query($con, "SELECT expense_amount FROM earn_expense WHERE action_date <= DATE(NOW()) - INTERVAL 30 DAY");
        $total_month_expense = 0;
        while ($month_expense = mysqli_fetch_assoc($month_expense_sql)) {
            $total_month_expense = $total_month_expense + $month_expense['expense_amount'];
        }
    ?>
                            <div class="quick-stats__info">
                                <h2>৳ <?php echo $total_month_expense ;?></h2>
                                <small>Last 30 days expense</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">5,6,3,9,7,5,4,6,5,6,4</div>
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

        <script src="resources/vendors/flot/jquery.flot.js"></script>
        <script src="resources/vendors/flot/jquery.flot.resize.js"></script>
        <script src="resources/vendors/flot/flot.curvedlines/curvedLines.js"></script>
        <script src="resources/vendors/peity/jquery.peity.min.js"></script>
        <script src="resources/vendors/jqvmap/jquery.vmap.min.js"></script>
        <script src="resources/vendors/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="resources/vendors/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="resources/vendors/fullcalendar/core/main.min.js"></script>
        <script src="resources/vendors/fullcalendar/daygrid/main.min.js"></script>

        <!-- App functions and actions -->
        <script src="resources/js/app.min.js"></script>
    </body>

</html>