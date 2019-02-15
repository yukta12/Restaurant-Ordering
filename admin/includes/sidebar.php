<ul class="sidebar navbar-nav toggled">
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Orders</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="">View all Orders</a>
           

        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="menu.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Add Menu</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="feedack.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Feedback</span></a>
    </li>
    <?php
//        session_start();
        if(isset($_SESSION['user_id']) ){
            $role = $_SESSION['role'];
        
            if ($role == "super_admin") {

                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="users.php" id="pagesDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Users</span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="users.php">View all user</a>
                        <a class="dropdown-item" href="">Add User</a>

                    </div>
                </li>
                <?php
            }
        }
    ?>

</ul>