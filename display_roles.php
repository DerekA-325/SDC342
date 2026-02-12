<?php
require_once(__DIR__ . '\..\controller\role.php');
require_once(__DIR__ . '\..\controller\role_controller.php');

$roles = RoleController::getAllRoles();
?>

<html>
<head>
    <title>Week 3 GP 3 - Derek Avery</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
    <h1>Week 3 GP3 - Derek Avery</h1>
    <h1>Available Roles</h1>
    <table>
    <tr>
    <th>Role No</th>
    <th>Role Name</th>
    </tr>
    <?php foreach($roles as $role) : ?>
    <tr>
    <td><?php echo $role->getRoleNo(); ?></td>
    <td><?php echo $role->getRoleName(); ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <h3><a href="../index.php">Home</a></h3>
</body>
</html>