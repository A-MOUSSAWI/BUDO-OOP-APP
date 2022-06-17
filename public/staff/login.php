<?php
session_start();
require_once('../../private/initialize.php');

$email = '';
$password = '';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($admin = Admin::find_by_email($email)) {

        if ($admin != false && $admin->verify_password($password)) {
            $admin == true;

            //df($admin->verify_password($password));
            $_SESSION['user_id'] = $admin->id;
            $_SESSION['admin_name'] = $admin->firstname;
            $_SESSION['admin_id'] = $admin->id;
            redirect_to('index2.php');
        }
    } elseif ($player = Player::find_by_email($email)) {
       //
        if ($player != false && $player->verify_password($password)) {
            //df($player);
            $_SESSION['user_id'] = $player->id;
            $_SESSION['player_id'] = $player->id;
            redirect_to('index2.php');
        }
    } else {
        echo "Invalid Email or password";
    }
}

?>
<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

    <h1>Log in</h1>
    <form action="login.php" method="post">
        email:<br />
        <input type="text" name="email" value="rami@mezhir.com" /><br />
        Password:<br />
        <input type="password" name="password" value="123456" /><br />
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>