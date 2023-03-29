<?php
define("DB_NAME", "C:\\xampp\\htdocs\\learnphp\\crud\\data\\data.csv");
function seed()
{
    $data = array(
        array(
            "fName" => "Md Abu Al",
            "lName" => "Sayed",
            "age" => "26.07",
            "id" => "82",
        ),
        array(
            "fName" => "shafayat",
            "lName" => "Hossain",
            "age" => "26.11",
            "id" => "91",
        ),
        array(
            "fName" => "Sufol",
            "lName" => "Mondol",
            "age" => "28.8",
            "id" => "99",
        ),
        array(
            "fName" => "Jahanara",
            "lName" => "Ferdous",
            "age" => "27.03",
            "id" => "90",
        ),
        array(
            "fName" => "Ibrahim",
            "lName" => "Kholil",
            "age" => "29.07",
            "id" => "18",
        ),
        array(
            "fName" => "Mosiur",
            "lName" => "Rahman",
            "age" => "27.05",
            "id" => "42",
        ),

    );

    $dataJson = json_encode($data);

    file_put_contents(DB_NAME, $dataJson, LOCK_EX);
}

function getReport()
{

    if (file_exists(DB_NAME)) {
        $fileName = file_get_contents(DB_NAME);
        $students = json_decode($fileName, true);
    }

    if (!empty($fileName)) :
?>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                usort($students, function ($a, $b) {
                    // return  -$a['age'];
                    if ($b['age'] == $a['age']) return 0;
                    return ($b['age'] < $a['age']) ? -1 : 1;
                });
                foreach ($students as $student) {
                ?>
                    <tr>

                        <td><?php printf("%s %s", $student['fName'], $student['lName']); ?></td>
                        <td><?php printf("%s", $student['age']); ?></td>
                        <td><?php printf("%s", $student['id']); ?></td>
                        <td><?php printf("<a href='index.php?task=edit&id=%s'>Edit</a> | <a href='index.php?task=delete&id=%s'>Delete</a>", $student['id'], $student['id']); ?></td>
                    </tr>

                <?php
                }
                ?>


            </tbody>


        </table>


<?php
    endif;
}


function addStudent($fName, $lName, $age)
{
    if (file_exists(DB_NAME)) {
        $fileName = file_get_contents(DB_NAME);
        $students = json_decode($fileName, true);
    }

    $student = array(
        "fName" => $fName,
        "lName" => $lName,
        "age" => $age,
        "id" => "42",
    );

    array_push($students, $student);
    $dataJson = json_encode($students);
    file_put_contents(DB_NAME, $dataJson, LOCK_EX);
}
