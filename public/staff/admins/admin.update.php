<?php
session_start();
require_once '../../../private/initialize.php';

if  (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

$id = validate_id()
/*if (!$id) {
    redirect_to('admins.list.php');
}*/
?>

<?php $admin = Admin::find_by_id($id); ?>

<?php var_dump($admin); ?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $args = [];
    $args['firstname'] = $_POST['firstname'];
    $args['lastname'] = $_POST['lastname'];
    $args['email'] = $_POST['email'];
    $args['username'] = $_POST['username'];


    $admin = new Admin($args);
    $result = $admin->update($id);
    if ($result) {
        redirect_to("admin.info.php?id=" . $id);
    }
}
?>

<?php $page_title = $admin->firstname . " " . $admin->lastname; ?>
<?php include(SHARED_PATH . '/header.php'); ?>


<div id="main">
    <a href="admins.list.php">Back to admins list</a>
    <form action="admin.update.php?id=<?php echo $id; ?>" method="POST" />
    <input type="text" name="firstname" placeholder="firstname" value="<?php echo $admin->firstname; ?>"><br>
    <input type="text" name="lastname" placeholder="lastname" value="<?php echo $admin->lastname; ?>"><br>
    <input type="text" name="email" placeholder="email" value="<?php echo $admin->email; ?>"><br>
    <input type="text" name="username" placeholder="username" value="<?php echo $admin->username; ?>"><br>
    <input type="submit" value="Update">
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>