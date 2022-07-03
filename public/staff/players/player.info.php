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

<?php $player = Player::find_by_id($id); ?>

<?php $games = Player::find_games($id);

//var_dump($games);
// echo count($games);
// print_r($games);
// print_r(array_keys($games));
// echo"</pre>";
?>
<?php $page_title = $player->firstname . " " . $player->lastname; ?>
<?php include(SHARED_PATH . '/header.php') ?>


<div id="main">

    <a href="players.list.php">&laquo;Back to players list</a>

    <div id="page">

        <div class="detail">
            <br>
            <dl>
                <dt>First Name</dt>
                <dd><?php echo $player->firstname ?></dd>
            </dl>
            <dl>
                <dt>Last Name</dt>
                <dd><?php echo $player->lastname ?></dd>
            </dl>
            <dl>
                <dt>Email</dt>
                <dd><?php echo $player->email ?></dd>
            </dl>
            <?php

            ?>

            <dl>
                <dt>Game</dt>
                <dd>
                    <?php
                    $keys = array_keys($games);
                    for ($i = 0; $i < count($games); $i++) {

                        foreach ($games[$keys[$i]] as $key => $value) {
                            if ($key == "game_name") {
                                echo  $value . "<br>";
                            }
                        }
                    }
                    //echo $games->game_name; 
                    ?>
                </dd>
            </dl>

            <dl>
                <dt>Date of registration</dt>
                <dd> <?php
                        $keys = array_keys($games);
                        for ($i = 0; $i < count($games); $i++) {

                            foreach ($games[$keys[$i]] as $key => $value) {
                                if ($key == "date_of_registration") {
                                    echo  $value . "<br>";
                                }
                            }
                        }
                        //echo $games->date_of_registration;
                        ?></dd>
            </dl>
            <dl>
                <dt>Subscription Expiry</dt>

                <dd></dd>
            </dl>

        </div>

    </div>

</div>

<?php include(SHARED_PATH . '/footer.php') ?>