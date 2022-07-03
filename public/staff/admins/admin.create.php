<?php
session_start();
require_once '../../../private/initialize.php';
include SHARED_PATH . '/header.php';
$title = "Add Admin";

if (!isset($_SESSION['admin_id'])) {
	redirect_to(url_for('staff/login.php'));
}

$form_complete = true;
?>

<form action="admin.create.php" method="POST" />

<div>
	<h1>
		Add Admin
	</h1>
</div>
<a href="<?php echo url_for('staff/admins/admins.list.php'); ?>">&laquo;List Page</a>
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
	<label for="email">Email</label><input type="text" name="email" placeholder="Email" required>
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
<input type="submit" value="Create">

<?php
include SHARED_PATH . '/footer.php';
if ($form_complete && $_SERVER['REQUEST_METHOD'] == 'POST') {
	$args = [];
	$args['firstname'] = check_input($_POST['firstname']);
	$args['lastname'] = check_input($_POST['lastname']);

	if ($admin = Admin::check_email_exists($_POST['email'])) {
		echo "<p class='alert'>Email is already exists</p>";
		dd($admin);
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
	$admin = new Admin($args);
	$result = $admin->create();
}