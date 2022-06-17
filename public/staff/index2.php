<?php
session_start();
require_once '../../private/initialize.php';


if  (!isset($_SESSION['user_id'])) {
    header("Location:login.php");
}
echo $_SESSION['user_id'];


$page_title = "Main Page";
include SHARED_PATH . '/header.php';

?>
<h1>Index Page</h1>
<a href="<?php echo url_for('/staff/index.php');?>">Main Page</a>

<h3>WELCOME TO PLAYERS'S PAGE 222</h3>
    <ul>
        <li>
            <a href="##">Link 2</a>
        </li>
        <li>
        <a href="##">Link 3</a>

        </li>
    </ul>

<?php include SHARED_PATH . '/footer.php'; ?>