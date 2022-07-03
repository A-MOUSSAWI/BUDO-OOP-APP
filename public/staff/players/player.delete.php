<?php
session_start();
require_once '../../../private/initialize.php';
include SHARED_PATH . '/header.php';
$title = "Add Player";

if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

$id = $_GET['id'];
$player = Player::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $player->delete($id);
    if ($player) {
        redirect_to("players.list.php");
    }
}
?>
<div>
    <a href="players.list.php">&laquo;Back to players list</a>
</div>

<div>
    <?php echo "Are you sure that you want to remove<strong> $player->firstname $player->lastname </strong>from players list?"; ?>
</div>
<form action="player.delete.php?id=<?php echo $id ?>" method="POST" />
<input type="submit" value="Delete">