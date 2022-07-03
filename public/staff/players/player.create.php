<?php
session_start();
require_once '../../../private/initialize.php';
$title = "Add player";
$form_complete = true;
?>

<?php include SHARED_PATH . '/header.php' ?>

<div>
	<h1>Add Player</h1>
	</div>
<a href="<?php echo url_for('staff/players/players.list.php'); ?>">&laquo;List Page</a>
<div>
</div>
<form action="player.create.php" method="POST" >
<div>
	<?php
	if (isset($_POST['firstname']) && empty(trim($_POST['firstname']))) {
		echo "<p class=\"alert\">firstname is required</p>";
		$form_complete = false;
	}
	?>
	<label for="firstname">Firstname</label><input type="text" name="firstname" placeholder="Firstname" required>
</div>

<div>
	<?php
	if (isset($_POST['lastname']) && empty(trim($_POST['lastname']))) {
		echo "<p class=\"alert\">lastname is required</p>";
		$form_complete = false;
	}
	?>
	<label for="lastname">Lastname</label><input type="text" name="lastname" placeholder="Lastname" required>
</div>

<div>
	<?php
	if (isset($_POST['email']) && empty(trim($_POST['email']))) {
		echo "<p class=\"alert\">email is required</p>";
		$form_complete = false;
	}
	?>
	<label for="email">Email</label><input type="email" name="email" placeholder="Email" required>
</div>

<div>
	<?php
	if (isset($_POST['password']) && empty(trim($_POST['password']))) {
		echo "<p class=\"alert\">password is required</p>";
		$form_complete = false;
	}
	?>
	<label for="password">Password</label><input type="password" name="password" placeholder="Password" required>
</div>

<div>
	<?php
	if (isset($_POST['confirm_password']) && empty(trim($_POST['confirm_password']))) {
		echo "<p class=\"alert\">confirm_password is required</p>";
		$form_complete = false;
	}
	?>
	<label for="confirm_password">Confirm Password</label><input type="password" name="confirm_password" placeholder="Confirm Password" required>
</div>

<div>
	<p><b>Choose a game</b></p>
	<label for="karate-adults">karate-adults</label>
	<input type="checkbox" value="1" name="game[]"><br>
	<label for="karate-kids">karate-kids</label>
	<input type="checkbox" value="2" name="game[]"><br>
	<label for="cardio">cardio</label>
	<input type="checkbox" value="3" name="game[]">
</div>

<input type="submit" value="Create">
</form>

<?php include SHARED_PATH . '/footer.php';
if ($form_complete) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$args = [];
		$args['firstname'] = check_input($_POST['firstname']);
		$args['lastname'] = check_input($_POST['lastname']);

		//$args['email'] 
		if ($player = Player::check_email_exists($_POST['email'])) {
			echo "<p class='alert'>Email is already exists</p>";
		} elseif (filter_var(check_input($_POST['email']), FILTER_VALIDATE_EMAIL) == TRUE) {
			$args['email'] = filter_var(check_input($_POST['email']), FILTER_VALIDATE_EMAIL);
		} else {
			echo "<p class='alert'>Email format is incorrect!!</p>";
			exit();
		}

		$args['password'] =  $_POST['password'];
		$args['confirm_password'] = $_POST['confirm_password'];

		if ($args['password'] !== $args['confirm_password']) {
			echo "<p class=\"alert\">Password doesn't confirm</p>";
			exit();
		}

		$args['game'] =  $_POST['game'];

		$player = new Player($args);
		$result = $player->create();
	}
}
?>