<?php
session_start();
require_once('../../private/initialize.php');

unset($_SESSION['user_id']);
unset($_SESSION['player_id']);
unset($_SESSION['admin_id']);
redirect_to(url_for('/staff/index.php'));

?>
