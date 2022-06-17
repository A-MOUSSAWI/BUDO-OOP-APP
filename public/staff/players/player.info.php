<?php
session_start();
require_once '../../../private/initialize.php';


if  (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

$id = $_GET['id'];
if (!$id) {
    redirect_to('players.list.php');
}
?>

<?php $player = Player::find_by_id($id); ?>



    <?php $page_title = $player->firstname . " " . $player->lastname; ?>
    <?php include(SHARED_PATH . '/header.php'); ?>


    <div id="main">

        <a href="players.list.php">Back to players list</a>

        <div id="page">

            <div class="detail">
                <br>
                <dl>
                    <dt>First Name</dt>
                    <dd><?php echo $player->firstname; ?></dd>
                </dl>
                <dl>
                    <dt>Last Name</dt>
                    <dd><?php echo $player->lastname; ?></dd>
                </dl>
                <dl>
                    <dt>Email</dt>
                    <dd><?php echo $player->email; ?></dd>
                </dl>
               

            </div>

        </div>

    </div>

    <?php include(SHARED_PATH . '/footer.php'); ?>