<?php
require_once '../../../private/initialize.php';
$page_title = "Main Page";
include SHARED_PATH . '/header.php';

?>
<h1>Index Page</h1>
<h3>WELCOME TO PLAYERS'S PAGE</h3>
<ul>
    
    <li>
        <a href="<?php echo url_for('staff/players/players.list.php'); ?>">Players list</a>
    </li>
    <li>
        <a href="<?php echo url_for('staff/players/player.create.php'); ?>">Add Player </a>

    </li>
</ul>

<?php include SHARED_PATH . '/footer.php'; ?>