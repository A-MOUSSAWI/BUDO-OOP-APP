<?php
session_start();
require_once '../../../private/initialize.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}


$page_title = "player Page";
include SHARED_PATH . '/header.php';

?>
<h1>List Of Players </h1>
<ul>

    <li>
        <a href="<?php echo url_for('staff/index.php'); ?>">Main Page</a>
    </li>

</ul>



<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>

            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>


        </tr>
    </thead>
    <tbody>
        <?php

        $players = Player::find_all();
      


        ?>
        <?php foreach ($players as $player) { ?>
         
            <tr>
                <th scope="row"><?php echo $player->id; ?></th>
                <th scope="row"><?php echo $player->firstname; ?></th>
                <td><?php echo $player->lastname; ?></td>
                <td><?php echo $player->email; ?></td>

                <td><a href="player.info.php?id=<?php echo $player->id; ?>">View</a></td>
                <td><a href="player.delete.php?id=<?php echo $player->id; ?>">Delete</a></td>
                <td><a href="player.update.php?id=<?php echo $player->id; ?>">Update</a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>


<?php include SHARED_PATH . '/footer.php'; ?>