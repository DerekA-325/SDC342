<?php
require_once(__DIR__ . '\..\controller\person.php');
require_once(__DIR__ . '\..\controller\person_controller.php');
require_once(__DIR__ . '\..\controller\role.php');
require_once(__DIR__ . '\..\controller\role_controller.php');

$roles = RoleController::getAllRoles();

$person = new Person('','',date('Y-m-d'), $roles[0]);
$person->setPersonNo(-1);
$pageTitle = "Add a New Person";

if (isset($_GET['pNo'])) {
    $person = PersonController::getPersonByNo($_GET['pNo']);
    $pageTitle = "Update an Existing Person";
}

if (isset($_POST['save'])) {
    $person = new Person($_POST['fname'], $_POST['lname'],
    $_POST['start'], $roles[$_POST['roleOption']-1]);

    if ($person->getPersonNo() === '-1') {
        PersonController::addPerson($person);
    } else {
        PersonController::updatePerson($person);
    }

    header('Location: ./display_people.php');
}
if (isset($_POST['cancel'])) {
    header('Location: ./display_people.php');
}
?>

<html>
<head>
    <title>Week3 GP3 - Derek Avery</title>
</head>
<body>
    <h1>Week3 GP3 - Derek Avery</h1>
    <h2><?php echo $pageTitle; ?></h2>
    <form method='POST'>
        <h3>First Name: <input type="text" name="fname" value="<?php echo $person->getFirstName(); ?>"></h3>
        <h3>Last Name: <input type="text" name="lname" value="<?php echo $person->getLastName(); ?>"></h3>
        <h3>Start Date: <input type="date" name="start" value="<?php echo $person->getStartDate(); ?>"></h3>
        <h3>Role: <select name="roleOption"><?php foreach($roles as $role) : ?> <option value="<?php echo $role->getRoleNo(); ?>"
            <?php if ($role->getRoleNo() === $person->getRole()->getRoleNo()) {
                echo 'selected'; }?>>
            <?php echo $role->getRoleName(); ?></option>
            <?php endforeach ?>
            </select>
        </h3>
        <input type="hidden" value="<?php echo $person->getPersonNo(); ?>" name="pNo">
        <input type="submit" value="Save" name="save">
        <input type="submit" value="Cancel" name="cancel">
    </form>
</body>
</html>