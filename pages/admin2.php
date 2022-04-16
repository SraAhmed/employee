<!DOCTYPE html>
<html lang="en">
<?php
include_once("../connection.php");
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>admin2</title>
  <link rel="stylesheet" href="../css/admin2.css" />
  <script>
    function remove(el) {
      el.remove();
    }
  </script>
</head>

<body>
  <section>
    <div class="container">
      <div class="Orders-box">
        <?php
        $query_employee  = "SELECT";
        $query_employee .= "*";
        $query_employee .= " FROM employee";
        $query_employee .= " WHERE employee.approval = '1'";

        $res_employee = mysqli_query($conn, $query_employee);
        while ($row_employee = mysqli_fetch_array($res_employee)) {
          echo '<div class="order" onclick="remove(this)">';
          echo '<div class="order-state">تم الاعتماد </div>';
          echo "<div class='order-title'>" . $row_employee["fullName"] . "</div>";
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
          echo '<div class="order" onclick="remove(this)">';
          echo '<div class="order-state"  style="color: red">لم يتم الاعتماد </div>';
          echo "<div class='order-title'>" . $row_employe["fullName"] . "</div>";

          echo "</div>";
        }
        ?>
      </div>
      <div class="Form-box">
        <h1 class="title-form">انشاء ايميلات</h1>
        <form class="form" action="https://formspree.io/f/xwkyrral" method="post">
          <input class="input input-1" type="text" name="names" placeholder="name" required />
          <input class="input" type="email" name="emails" placeholder="email" required />
          <input class="input input-3" type="text" name="messages" placeholder="message" required />
          <button class="submit-btn" type="submit">
            <h1>ارسال</h1>
          </button>
        </form>
      </div>
    </div>
  </section>
</body>

</html>