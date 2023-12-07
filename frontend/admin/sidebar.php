<nav class="sidebar bg-primary-color sidebar-offcanvas  shadow" id="sidebar">
    <ul class="nav">
        <li class="nav-item mb-3 <?php echo $_SERVER['PHP_SELF'] == '/appointsche/frontend/admin/index.php' ? 'bg-light rounded' : '';?>">
            <a class="nav-link" href="index.php">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="menu-title px-3">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mb-3 <?php echo $_SERVER['PHP_SELF'] == '/appointsche/frontend/admin/users.php' ? 'bg-light rounded' : '';?>">
            <a class="nav-link" href="users.php">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span class="menu-title px-3">Users</span>
            </a>
        </li>
        <li class="nav-item mb-3 <?php echo $_SERVER['PHP_SELF'] == '/appointsche/frontend/admin/schedules.php' ? 'bg-light rounded' : '';?>">
            <a class="nav-link" href="schedules.php">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="menu-title px-3">Schedule</span>
            </a>
        </li>
        <li class="nav-item mb-3 <?php echo $_SERVER['PHP_SELF'] == '/appointsche/frontend/admin/appoinments.php' ? 'bg-light rounded' : '';?>">
            <a class="nav-link" href="appoinments.php">
                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                <span class="menu-title px-3">Appointments</span>
            </a>
        </li>
    </ul>
</nav>
