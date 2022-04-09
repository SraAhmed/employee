<?php
session_start();
if (isset($_SESSION['user'])) {
    header('logout.php');
    exit();
}
if (isset($_POST['submit'])) {
    include "../connection.php";
    $fullname = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING);
    $nameEng = filter_var($_POST['nameEng'], FILTER_SANITIZE_STRING);
    $num = filter_var($_POST['num'], FILTER_SANITIZE_STRING);
    $operatorNum = filter_var($_POST['operatorNum'], FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    $section = filter_var($_POST['section'], FILTER_SANITIZE_STRING);
    $noMobile = filter_var($_POST['noMobile'], FILTER_SANITIZE_STRING);
    $errors = [];
    //validate fullname
    if (empty($fullname)) {

        $errors[] =  "<p style='color:red'> يجب كتابة الاسم * </p>";
    } elseif (strlen($fullname) > 100) {
        $errors[] = " <p style='color:red'>يجب ان لا يكون الاسم اكبر من 100 حرف * </p>";
    }

    //validate nameEnglish
    if (empty($nameEng)) {
        $errors[] = "<p style='color:red'>يجب كتابة الاسم باللغة الانكليزية * </p>";
    } elseif (strlen($nameEng) > 100) {
        $errors[] = " <p style='color:red'> يجب ان لا يكون الاسم اكبر من 100 حرف *</p>";
    }

    //validate num
    if (empty($num)) {
        $errors[] = "<p style='color:red'>يجب كتابة رقم الهوية الوطنية *</p>";
    } elseif (strlen($num) > 12) {
        $errors[] = "<p style='color:red'> يجب ان لا يكون الرقم اكبر من 12 رقم *</p>";
    }

    //validate State
    if (empty($state)) {
        $errors[] = "<p style='color:red'>يجب كتابة الرتبة *</p>";
    } elseif (strlen($nameEng) > 100) {
        $errors[] = "<p style='color:red'> يجب ان لا يكون الاسم اكبر من 100 حرف *</p>";
    }

    //validate Section
    if (empty($section)) {
        $errors[] = "<p style='color:red'>يجب كتابة اسم القسم *</p>";
    } elseif (strlen($section) > 100) {
        $errors[] = " <p style='color:red'>يجب ان لا يكون الاسم اكبر من 100 حرف *</p>";
    }

    //validate No.Mobile
    if (empty($noMobile)) {
        $errors[] = "<p style='color:red'>يجب كتابة رقم الجوال *</p>";
    } elseif (strlen($noMobile) > 12) {
        $errors[] = "  <p style='color:red'>يجب ان لا يكون الرقم اكبر من 11 رقم *</p>";
    }
    //insert or errors
    if (empty($errors)) {
        //    echo "insert DB";

        $stm = "INSERT INTO `employee`(`fullName`, `nameEng`, `num`, `operatorNum`, `state`, `section`, `noMobile`) VALUES ('$fullname','$nameEng','$num','$$operatorNum','$state','$section','$noMobile')";

        $result = mysqli_query($conn, $stm);
        $_POST['fullName'] = '';
        $_POST['nameEng'] = '';
        $_POST['num'] = '';
        $_POST['operatorNum'] = '';
        $_POST['state'] = '';
        $_POST['section'] = '';
        $_POST['noMobile'] = '';
        $_SESSION['user'] = [
            "fullName"      => $fullname,
            "nameEng"       => $nameEng,
            "num"           => $num,
            "operatorNum"   => $operatorNum,
            "state"         => $state,
            "section"       => $section,
            "noMobile"      => $noMobile

        ];
        header('location:logout.php');
    }
}
?>
<form action="login.php" method="POST">
    <?php
    if (isset($errors)) {
        if (!empty($errors)) {
            foreach ($errors as $msg) {
                echo $msg . "<br>";
            }
        }
    } ?>
    <input type="text" placeholder="Full NAme" value="<?php if (isset($_POST['fullName'])) {
                                                            echo $_POST['fullName'];
                                                        } ?>" name="fullName"> <br>
    <input type="text" placeholder="NameEnglish" value="<?php if (isset($_POST['nameEng'])) {
                                                            echo $_POST['nameEng'];
                                                        } ?>" name="nameEng"><br>
    <input type="text" placeholder="Num" value="<?php if (isset($_POST['num'])) {
                                                    echo $_POST['num'];
                                                } ?>" name="num"><br>
    <input type="text" placeholder="OperatorNumber" value="<?php if (isset($_POST['operatorNum'])) {
                                                                echo $_POST['operatorNum'];
                                                            } ?>" name="operatorNum"><br>
    <input type="text" placeholder="State" value="<?php if (isset($_POST['state'])) {
                                                        echo $_POST['state'];
                                                    } ?>" name="state"><br>
    <input type="text" placeholder="Section" value="<?php if (isset($_POST['section'])) {
                                                        echo $_POST['section'];
                                                    } ?>" name="section"><br>
    <input type="text" placeholder="No.Mobile" value="<?php if (isset($_POST['noMobile'])) {
                                                            echo $_POST['noMobile'];
                                                        } ?>" name="noMobile"><br>
    <input type="submit" value="<?php if (isset($_POST['submit'])) {
                                    echo $_POST['submit'];
                                } ?>" name="submit">

</form>