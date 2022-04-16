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

<body>
    <?php
    include_once("nav.php");
    ?>

    <div class="container">
        <div class="title">
            <h1>النماذج</h1>
            <h1>السابقة</h1>
        </div>
        <div class="incoming">
            <!-- .... -->
            <?php
            $query_employee  = "SELECT";
            $query_employee .= "*";
            $query_employee .= " FROM employee";
            $query_employee .= " WHERE employee.approval = '1'";

            $res_employee = mysqli_query($conn, $query_employee);
            while ($row_employee = mysqli_fetch_array($res_employee)) {
                echo "<div class='item'>";
                echo "<div class='text' style='padding: 12px'>";
                echo '<div  style="position: absolute;color: cornflowerblue;font-size: 23px;top: 20px;
                left: 20px; text-align: left;">تم الاعتماد </div>';
                echo "<a class='name-item'>" . $row_employee["fullName"] . "</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            <?php
            $query_employe  = "SELECT";
            $query_employe .= "*";
            $query_employe .= " FROM employee";
            $query_employe .= " WHERE employee.approval = '2'";

            $res_employe = mysqli_query($conn, $query_employe);
            while ($row_employe = mysqli_fetch_array($res_employe)) {
                echo "<div class='item'>";

                echo "<div class='text' class='name-item'>";
                echo '<div  style="position: absolute;color: red;font-size: 23px;top: 20px;
                left: 20px; text-align: left;">لم يتم الاعتماد </div>';
                echo "<a class='name-item'>" . $row_employe["fullName"] . "</a>";

                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>