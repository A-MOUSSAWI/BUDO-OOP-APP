<?php
session_start();
require_once '../../../private/initialize.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

$id = $_GET['id'];
if (!$id) {
    redirect_to('admins.list.php');
}
$admin = Admin::find_by_id($id);
$title = $admin->firstname . " " . $admin->lastname;
?>

<?php include SHARED_PATH . '/header.php' ?>

<div id="main">
    <a href="admins.list.php">&laquo;Back to admins list</a>
    <div id="page">

        <div class="detail">
            <br>
            <dl>
                <dt>First Name</dt>
                <dd><?php echo $admin->firstname ?></dd>
            </dl>
            <dl>
                <dt>Last Name</dt>
                <dd><?php echo $admin->lastname ?></dd>
            </dl>
            <dl>
                <dt>Email</dt>
                <dd><?php echo $admin->email ?></dd>
            </dl>
        </div>

    </div>
</div>
<?php include(SHARED_PATH . '/footer.php') ?>