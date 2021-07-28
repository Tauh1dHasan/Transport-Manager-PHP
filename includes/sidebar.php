<aside class="sidebar ">
    <div class="scrollbar">
        <div class="user">
            <div class="user__info" data-toggle="dropdown">
    <?php  
        $userDataSql = mysqli_query($con, "SELECT * FROM user WHERE u_id = '$USERID' ");
        $userRow = mysqli_fetch_assoc($userDataSql);

        $userPic = $userRow['picture'];
        if (empty($userPic)) {
    ?>

                <img class="user__img" src="demo/img/profile-pics/2.jpg" alt="">
    <?php }else{ ?>
                <img class="user__img" src="upload/user_pictures/<?php echo $userPic ;?>" alt="">
    <?php } ?>
                <div>
                    <div class="user__name"><?php echo $userRow['name'] ;?></div>
                    <div class="user__email"><?php echo $userRow['email'] ;?></div>
                </div>
            </div>

            <div class="dropdown-menu dropdown-menu--invert">
                <a class="dropdown-item" href="profile.php">Progile</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>

        <ul class="navigation">
            <li><a href="index.php"><i class="zwicon-home"></i>হোম</a></li>

            <li class="navigation__sub">
                <a href="#"><i class="zwicon-note"></i>লোড/আনলোড</a>

                <ul>
                    <li>
                        <a href="load-unload-entry.php">নতুন লোড/আনলোড লিখুন</a>
                    </li>
                    <li>
                        <a href="load-unload-history.php">সকল লোড/আনলোড হিসাব</a>
                    </li>
                </ul>
            </li>

            <li class="navigation__sub">
                <a href="#"><i class="zwicon-coin"></i>দৈনিক আয়/ব্যায়</a>

                <ul>
                    <li>
                        <a href="earn-expense-entry.php">আজকের আয়/ব্যায় লিখুন</a>
                    </li>
                    <li>
                        <a href="earn_expense_list.php">আয়/ব্যায় হিসাব দেখুন</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>