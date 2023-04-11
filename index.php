<?php
require_once("functions.php");
$info = "";
$task = $_GET['task'] ?? 'report';
$error = $_GET['error'] ?? '0';
if ('seed' == $task) {
    seed();
    $info = "Seeding is Complete";
}

if (isset($_POST['submit'])) {
    $fName = filter_input(INPUT_POST, 'fName', FILTER_DEFAULT);
    $lName = filter_input(INPUT_POST, 'lName', FILTER_DEFAULT);
    $age = filter_input(INPUT_POST, 'age', FILTER_DEFAULT);
    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);

    if ($fName != '' && $lName != '' && $age != '' && $id != '') {
        addStudent($fName, $lName, $age, $id);
        header("location: index.php?task=report ");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="//milligram.io/images/favicon-32x32.png">
    <title>Crud Project</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <!-- Milligram CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/style.css">
</head>

<body>

    <div class="crud-wrapper-area">
        <div class="container">

            <div class="row">
                <div class="column text-center">
                    <h1>Crud Project</h1>
                    <p>A Simple PHP project for CRUD Oparation</p>
                </div>
            </div>
            <div class="row align-center">
                <div class="column column-50 text-center">
                    <?php include_once('inc/templates/nav.php'); ?>
                    <hr />
                    <?php
                    if ($info != "") {
                        echo "<p>{$info}</p>";
                    }
                    ?>
                </div>
            </div>

            <?php if ('1' == $error) : ?>
                <div class="row align-center">
                    <div class="column column-75 text-center">
                        <blockquote>
                            Dulplicate ID Number
                        </blockquote>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ('report' == $task) : ?>
                <div class="row align-center">
                    <div class="column column-75 text-center">
                        <?php getReport(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ('add' == $task) : ?>
                <div class="row align-center">
                    <div class="column column-50">
                        <form action="index.php?=report" method="POST">
                            <label for="fName">Frist Name</label>
                            <input type="text" name="fName" id="fName">
                            <label for="lName">Last Name</label>
                            <input type="text" name="lName" id="lName">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age">
                            <label for="id">Id</label>
                            <input type="number" name="id" id="id">
                            <button type="submit" name="submit" id="save">Save</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>


</body>

</html>