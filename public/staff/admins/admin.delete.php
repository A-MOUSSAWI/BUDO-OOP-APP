<?php
session_start();
require_once '../../../private/initialize.php';
$page_title = "Add admin";
include SHARED_PATH . '/header.php';

if  (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

$id = validate_id();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin = new Admin();
    $result = $admin->delete($id);
    if ($result) {
        redirect_to("admins.list.php");
    }
}
?>
<?php
$admin = Admin::find_by_id($id);
?>

<div>
    <a href="admins.list.php">Back to admins list</a>
</div>

<div>
    <?php echo "Are you sure that you want to remove<strong> $admin->firstname $admin->lastname </strong>from admins list?"; ?>
</div>



<form action="admin.delete.php?id= <?= $id; ?>" method="POST" />

<input type="submit" value="Delete">