<?php
session_start();
require_once '../../../private/initialize.php';
$page_title = "Add Player";
include SHARED_PATH . '/header.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}


$id = $_GET['id']
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $player = new Player();
    $result = $player->delete($id);
    if ($result) {
        redirect_to("players.list.php");
    }
}
?>
<?php $player = Player::find_by_id($id); ?>


    <div>
        <a href="players.list.php">Back to players list</a>
    </div>

    <div>
        <?php echo "Are you sure that you want to remove<strong> $player->firstname $player->lastname </strong>from players list?"; ?>
    </div>


<form action="player.delete.php?id=<?php echo $id; ?>" method="POST" />

<input type="submit" value="Delete">