<?php
session_start();
require_once '../../../private/initialize.php';
$page_title = "Add Admin";
include SHARED_PATH . '/header.php';


if  (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

$form_complete = true;
?>

<form action="admin.create.php" method="POST" />

<div>
	<h1>
		Add Admin
	</h1>
</div>
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
	if (isset($_POST['username']) && empty(trim($_POST['username']))) {
		echo "<p class=\"alert\">username is required</p>";
		$form_complete = false;
	}
	?>
	<label for="username">Username</label><input type="text" name="username" placeholder="Username" required>
</div>

<div>
	<?php
	if (isset($_POST['password']) && empty(trim($_POST['password']))) {
		echo "<p class=\"alert\">password is required</p>";
		$form_complete = false;
	}
	?>
	<label for="password">Password</label><input type="text" name="password" placeholder="Password" required>
</div>
<div>
	<?php
	if (isset($_POST['confirm_password']) && empty(trim($_POST['confirm_password']))) {
		echo "<p class=\"alert\">confirm_password is required</p>";
		$form_complete = false;
	}
	?>
	<label for="confirm_password">Confirm Password</label><input type="text" name="confirm_password" placeholder="Confirm Password" required>
</div>

<input type="submit" value="Create">

<?php include SHARED_PATH . '/footer.php'; ?>
<?php
if ($form_complete) {


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$args = [];
		$args['firstname'] = check_input($_POST['firstname']);
		$args['lastname'] = check_input($_POST['lastname']);

		if ($admin= Admin::find_by_email($_POST['email']) == true ) {
			echo"<p class='alert'>Email is already exists</p>";
		exit;}
		
			elseif(filter_var(check_input( $_POST['email']),FILTER_VALIDATE_EMAIL)== TRUE){
				$args['email'] = filter_var(check_input( $_POST['email']),FILTER_VALIDATE_EMAIL);
			}
			else{
				echo "<p class='alert'>Email format is incorrect!!</p>";
				exit();
			}
			
		
		
		$args['username'] =  check_input($_POST['username']);
		$args['password'] =  check_input($_POST['password']);
		$args['confirm_password'] =  check_input($_POST['confirm_password']);


		$admin = new Admin($args);
		$result = $admin->create();
	}
}
?>