<?php
session_start();
require_once '../../../private/initialize.php';
$title = "admin Page";
?>

<?php include SHARED_PATH . '/header.php' ?>

<h1>List Of admins </h1>
<ul>
    <li>
        <a href="<?php echo url_for('staff/index.php');
                    ?>"> &laquo;Main Page</a>
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
        $admins = Admin::find_all();
        foreach ($admins as $admin) { ?>

            <tr>
                <th scope="row"><?php echo $admin->id ?></th>
                <th scope="row"><?php echo $admin->firstname ?></th>
                <td><?php echo $admin->lastname ?></td>
                <td><?php echo $admin->email ?></td>
                <td><a href="admin.info.php?id=<?php echo $admin->id ?>">View</a></td>
                <td><a href="admin.delete.php?id=<?php echo $admin->id ?>">Delete</a></td>
                <td><a href="admin.update.php?id=<?php echo $admin->id ?>">Update</a></td>
            </tr>
        <?php   } ?>
    </tbody>
</table>
<?php include SHARED_PATH . '/footer.php' ?>