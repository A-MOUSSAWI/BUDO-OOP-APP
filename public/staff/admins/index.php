<?php
session_start();
require_once '../../../private/initialize.php';
$page_title = "Main Page";
include SHARED_PATH . '/header.php';


if  (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

?>
<h1>Index Page</h1>
<h3>WELCOME TO ADMINS'S PAGE</h3>
   <ul>
        <li>
            <a href="<?php echo url_for('staff/admins/admins.list.php'); ?>">Admins</a>
        </li>
        <li>
        <a href="<?php echo url_for('staff/admins/admin.create.php'); ?>">Add Admins</a>
        </li>
    </ul>
    
<?php include SHARED_PATH . '/footer.php'; ?>