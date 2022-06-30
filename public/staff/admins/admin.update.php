<?php
session_start();
require_once '../../../private/initialize.php';
include SHARED_PATH . '/header.php';
$title ="update";

if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $args = [];
    $args['firstname'] = $_POST['firstname'];
    $args['lastname'] = $_POST['lastname'];

    $args['email'] = $_POST['email'];

    $admin = new Admin($args);
    $result = $admin->update($id);
    if ($result) {
        header("Location:admin.info.php?id=" . $id);
    } else {
        echo "something wrong";
    }
}

$admin = Admin::find_by_id($id); ?>

<div id="main">
    <a href="admins.list.php">&laquo;Back to admins list</a>
    <form action="admin.update.php?id=<?php echo $id; ?>" method="POST" />
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" placeholder="firstname" value="<?php echo $admin->firstname; ?>"><br>
    <label for="firstname">Lastname</label>
    <input type="text" name="lastname" placeholder="lastname" value="<?php echo $admin->lastname; ?>"><br>
    <label for="firstname">Email</label>
    <input type="text" name="email" placeholder="email" value="<?php echo $admin->email; ?>"><br>

    <input type="submit" value="Update">
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>