<?php
require_once '../../../private/initialize.php';
$page_title = "General Page";
include SHARED_PATH . '/header.php';


?>
<h1>About Page</h1>

<ul>
    <li>
        <a href="<?php echo url_for('staff/players/players.list.php'); ?>">Our Champions</a>
    </li>
    <li>
        <a href="<?php echo url_for('index.php'); ?>"> Main </a>
    </li>
</ul>




<?php include SHARED_PATH . '/footer.php'; ?>