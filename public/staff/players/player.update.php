<?php
session_start();
require_once '../../../private/initialize.php';
include(SHARED_PATH . '/header.php');
if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}
$id = $_GET['id'];
if (!$id) {
    redirect_to('players.list.php');
}
?>
<?php $player = Player::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $args = [];
    $args['firstname'] = $_POST['firstname'];
    $args['lastname'] = $_POST['lastname'];
    $args['email'] = $_POST['email'];

    $player = new Player($args);
    $result = $player->update($id);
    if ($result) {
        redirect_to("player.info.php?id=" . $id);
    }
}
?>

<?php $page_title = $player->firstname . " " . $player->lastname;
include(SHARED_PATH . '/header.php'); 
?>

<div id="main">
    <a href="players.list.php">&laquo;Back to players list</a>
    <form action="player.update.php?id=<?php echo $id ?>" method="POST" >

    <input type="text" name="firstname" placeholder="firstname" value="<?php echo $player->firstname ?>"><br>
    <input type="text" name="lastname" placeholder="lastname" value="<?php echo $player->lastname ?>"><br>
    <input type="text" name="email" placeholder="email" value="<?php echo $player->email ?>"><br>

    <input type="submit" value="Update">
    </form>
</div>
<?php include(SHARED_PATH . '/footer.php') ?>