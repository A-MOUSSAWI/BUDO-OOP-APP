<?php
session_start();
require_once '../../../private/initialize.php';
include SHARED_PATH . '/header.php';
$title = "Add admin";

if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

$id = $_GET['id'];
$admin = Admin::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin->delete($id);
    if ($admin) {
        redirect_to("admins.list.php");
    }
}
?>
<div>
    <a href="admins.list.php">&laquo;Back to admins list</a>
</div>

<div>
    <?php echo "Are you sure that you want to remove<strong> $admin->firstname $admin->lastname </strong>from admins list?"; ?>
</div>
<form action="admin.delete.php?id=<?= $id ?>" method="POST" />
<input type="submit" value="Delete">
<?php include SHARED_PATH . '/footer.php' ?>