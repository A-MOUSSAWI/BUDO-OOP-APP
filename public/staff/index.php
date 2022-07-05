<?php
session_start();
require_once '../../private/initialize.php';
$title = "Main Page";
?>

<?php include SHARED_PATH . '/header.php' ?>

<h1>Home Page</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <img src="<?php echo url_for('images/budo-logo.jpg'); ?>" height="150" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />

        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="activities.php">Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Our Champions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Announcements</a>
                    </li>
                <?php endif ?>


                <?php if (isset($_SESSION['admin_id'])): ?>
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Admins Section
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li> <a class="nav-link" href="<?php echo url_for('staff/admins/admins.list.php'); ?>">Admins List</a></li>
                            <li> <a class="nav-link" href="<?php echo url_for('staff/admins/admin.create.php'); ?>">Add Admin</a></li>
                            <li> <a class="nav-link" href="<?php echo url_for('staff/players/players.list.php'); ?>">Players List</a></li>
                            <li> <a class="nav-link" href="<?php echo url_for('staff/players/player.create.php'); ?>">Add Player</a></li>
                        </ul>
                    </div>
                <?php endif ?>


            </ul>
            <!-- Left links -->

            <div class="d-flex align-items-center">

                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="<?php echo url_for('staff/login.php'); ?>">
                        <button type="button" class="btn btn-primary me-3" hidden>
                            Login
                        </button>
                    </a>

                <?php else: ?>
                    <a href="<?php echo url_for('staff/login.php'); ?>">
                        <button type="button" class="btn btn-primary me-3">
                            Login
                        </button>
                    </a>

                <?php endif ?>

                <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?php echo url_for('staff/players/player.create.php'); ?>">
                    <button type="button" class="btn btn-primary me-3" hidden>
                        Register
                    </button>
                </a>

                <?php else: ?>
                    <a href="<?php echo url_for('staff/players/player.create.php'); ?>">
                    <button type="button" class="btn btn-primary me-3" >
                        Register
                    </button>
                </a>
                <?php endif ?>
                <?php if (isset($_SESSION['user_id'])): ?>

                    <a href="<?php echo url_for('staff/logout.php'); ?>">
                        <button type="button" class="btn btn-primary me-3">
                            LogOut
                        </button>
                    </a>


                <?php endif ?>
            </div>
        </div>
    </div>
</nav>
<?php include SHARED_PATH . '/footer.php' ?>