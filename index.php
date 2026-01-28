<?php
    require_once('validator.php');

    //Declare and clear variables
    $name = '';
    $email = '';
    $date = '';
    $num = '';
    $nickname = '';

    //Declare and clear variables for error messaging
    $name_error = '';
    $email_error = '';
    $date_error = '';
    $num_error = '';
    $nickname_error = '';

    //Retrieve values from query string and store in a local variable as long as the query string exists (which it does not on first load of page).
    if (isset($_POST['name'])) 
    $name = $_POST['name'];
    
    if (isset($_POST['email'])) 
    $email = $_POST['email'];
    
    if (isset($_POST['date'])) 
    $date = $_POST['date'];
    
    if (isset($_POST['num'])) 
    $num = $_POST['num'];

    if (isset($_POST['nickname']))
    $nickname = $_POST['nickname'];
    

    //Validate the values entered
    //Call nameValid from the Avery_validator namespace
    $name_error = Avery_validator\nameValid($name);

    //Use Avery_validator namespace emailValid method; passing the
    //error message by reference
    Avery_validator\emailValid($email, $email_error);

    //Avery_validator namespace date validation using default REGEX
    $date_error = Avery_validator\dateValid($date);

    //Validation namespace numeric check
    try {
        Avery_validator\numericValue($num);
    }
    catch (Exception $e) {
        $num_error = $e->getMessage();
    }

    //Validate the nickname with stringValid from the Avery_validator namespace
    $nickname_error = Avery_validator\stringValid($nickname, 2);

?>
<html>
    <head>
        <title>Week1 GP3 - Derek Avery</title>
    </head>
    <body>
        <h2>Enter data for validation</h2>
        <form method='POST'>
            <h3>Enter your name (Last name, First name): <input type="text" name="name" value="<?php echo $name; ?>">
            <?php if (strlen($name_error) > 0) echo "<span style='color: red;'>{$name_error}</span>;" ?></h3>
            <h3>Enter your e-mail: <input type="text" name="email" value="<?php echo $email; ?>">
            <?php if (strlen($email_error) > 0) echo "<span style='color: red;'>{$email_error}</span>;" ?></h3>
            <h3>Enter your birthdate (MM/DD/YYYY): <input type="text" name="date" value="<?php echo $date; ?>">
            <?php if (strlen($date_error) > 0) echo "<span style='color: red;'>{$date_error}</span>;" ?></h3>
            <h3>Enter your favorite number: <input type="text" name="num" value="<?php echo $num; ?>">
            <?php if (strlen($num_error) > 0) echo "<span style='color: red;'>{$num_error}</span>;" ?></h3>
            <h3>Enter your nickname: <input type="text" name="nickname" value="<?php echo $nickname; ?>">
            <?php if (strlen($nickname_error) > 0) echo "<span style='color: red;'>{$nickname_error}</span>;" ?></h3>
            <input type="submit" value="Validate Values">
        </form>
        <h3><?php
            if (strlen($name_error > 0) || strlen($email_error) > 0 || strlen($date_error) > 0 || strlen($num_error) > 0) {
                echo "Errors found, please check your entries";
            } else {
                echo "All fields valid";
            }
        ?>
    </body>
</html>