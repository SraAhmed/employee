<!DOCTYPE html>
<html lang="en">
<?php
include_once("../connection.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>incoming</title>
    <link rel="stylesheet" href="../css/incoming.css">
</head>
<?php
if (isset($_POST["accept"])) {
    $ac_employee = "UPDATE `employee` ";
    $ac_employee .= "SET approval='1'";
    $ac_employee .= " WHERE id='" . $_POST["accept"] . "'";
    mysqli_query($conn, $ac_employee);
} elseif (isset($_POST["decline"])) {

    $de_employee = "UPDATE `employee` ";
    $de_employee .= "SET approval='2' ";
    $de_employee .= " WHERE id='" . $_POST["decline"] . "'";
    mysqli_query($conn, $de_employee);
}
?>

<body>
    <?php
    include_once("nav.php");
    ?>

    <div class="container">
        <div class="title">
            <h1>النماذج</h1>
            <h1>الواردة</h1>
        </div>
        <div class="incoming">
            <form action="incoming.php" method="POST">
                <?php
                $query_employee  = "SELECT";
                $query_employee .= "*";
                $query_employee .= " FROM employee";
                $query_employee .= " WHERE employee.approval = '0'";

                $res_employee = mysqli_query($conn, $query_employee);
                while ($row_employee = mysqli_fetch_array($res_employee)) {
                    echo "<div class='item'>";
                    echo "<div class='text' style='padding: 12px'>";
                    echo  $row_employee["fullName"];
                    echo '<button type="submit" name="accept"  value="' . $row_employee["id"] . '"  class="accept-btn"> قبول</button>';
                    echo '<button type="submit" name="decline" value="' . $row_employee["id"] . '"  class="refusal-btn" >رفض </button>';
                    echo "</div>";
                    echo "</div>";
                }
                echo "</form>";
                ?>
        </div>

    </div>

    <script src="../js/app.js"></script>
</body>

</html>