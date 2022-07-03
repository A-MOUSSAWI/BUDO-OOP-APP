<?php
session_start();
require_once '../../private/initialize.php';
include SHARED_PATH . '/header.php';
$title = "Main Page";

if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}
?>
<a href="<?php echo url_for('/staff/index.php'); ?>">&laquo;Main Page</a>
<h3>Players Activities</h3>
<ul>
    <li>
        <a href="##">Summer camp</a>
    </li>
    <li>
        <a href="##">Winter camp</a>
    </li>
</ul>

<?php include SHARED_PATH . '/footer.php' ?>