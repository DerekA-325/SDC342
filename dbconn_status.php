<?php
require_once(__DIR__ . '\..\model\database.php');

error_reporting(E_ERROR);

$db = new Database();
?>

<html>
<head>
    <title>Week 3 GP1 - Derek Avery</title>
</head>
<body>
    <h1>Week3 GP1 - Derek Avery</h1>
    <h1>Database Connection Status</h1>
    <?php if(strlen($db->getDBError())) : ?>
    <h2><?php echo $db->getDBError(); ?></h2>
    <ul>
        <li><?php echo "Database Name: " . $db->getDBName(); ?></li>
        <li><?php echo "Database Host: " . $db->getDBHost(); ?></li>
        <li><?php echo "Database User: " . $db->getDBUser(); ?></li>
        <li><?php echo "Database User Password: " . $db->getDBUserPw(); ?></li>
    </ul>
    <?php else : ?>
    <h2><?php echo "Successfully connected to " . $db->getDBName(); ?></h2>
    <?php endif; ?>
    <h3><a href='..\index.php'>Home</a></h3>
</body>
</html>