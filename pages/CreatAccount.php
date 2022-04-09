<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreatAccount</title>
    <link rel="stylesheet" href="../css/CreatAccount.css">
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('CreatAccount.php');
        exit();
    }
    if (isset($_POST['submit'])) {
        // database connection
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

    <div class="container">
        <div class="title">
            <h1>البيانات</h1>
            <h1>الشخصية</h1>
        </div>
        <div>
            <form class="form" action="CreatAccount.php" method="POST">

                <!---->

                <label for="full-name">
                    <h3>الاسم الكامل </h3>

                </label>

                <input type="text" id="full-name" value="<?php if (isset($_POST['fullName'])) {
                                                                echo $_POST['fullName'];
                                                            } ?>" name="fullName">
                <span>
                    <?php
                    if (isset($errors)) {
                        if (!empty($errors)) {
                            echo $errors[0];
                        }
                    } ?>

                </span>

                <!---->

                <br>

                <!---->
                <label for="english-name" class="english-name">
                    <h3>الاسم بالغة الانكليزية</h3>
                </label>
                <input type="text" id="english-name" value="<?php if (isset($_POST['nameEng'])) {
                                                                echo $_POST['nameEng'];
                                                            } ?>" name="nameEng">
                <span>
                    <?php
                    if (isset($errors)) {
                        if (!empty($errors)) {
                            echo $errors[1];
                        }
                    } ?>

                </span>
                <!---->

                <br>

                <!---->
                <label for="num-identity">
                    <h3>رقم الهوية</h3>
                </label>
                <input type="text" id="num-identity" value="<?php if (isset($_POST['num'])) {
                                                                echo $_POST['num'];
                                                            } ?>" name="num">
                <span>
                    <?php
                    if (isset($errors)) {
                        if (!empty($errors)) {
                            echo $errors[2];
                        }
                    } ?>

                </span>
                <!---->

                <br>

                <!---->
                <label for="num-operator" class="english-name">
                    <h3>رقم المشغل ان وجد</h3>
                </label>
                <input type="text" id="num-operator" value="<?php if (isset($_POST['operatorNum'])) {
                                                                echo $_POST['operatorNum'];
                                                            } ?>" name="operatorNum">

                <!---->

                <br>

                <!---->
                <label for="rank" class="rank">
                    <h3>المرتبة\الرتبة</h3>
                </label>
                <input type="text" id="rank" value="<?php if (isset($_POST['state'])) {
                                                        echo $_POST['state'];
                                                    } ?>" name="state">
                <span>
                    <?php
                    if (isset($errors)) {
                        if (!empty($errors)) {
                            echo $errors[3];
                        }
                    } ?>

                </span>
                <!---->

                <br>

                <!---->
                <label for="administration">
                    <h3>الادارة\القسم</h3>
                </label>
                <input type="text" id="administration" value="<?php if (isset($_POST['section'])) {
                                                                    echo $_POST['section'];
                                                                } ?>" name="section">
                <span>
                    <?php
                    if (isset($errors)) {
                        if (!empty($errors)) {
                            echo $errors[4];
                        }
                    } ?>

                </span>
                <!---->

                <br>

                <!---->
                <label for="num-phone">
                    <h3>رقم الهاتف</h3>
                </label>
                <input type="text" id="num-phone" value="<?php if (isset($_POST['noMobile'])) {
                                                                echo $_POST['noMobile'];
                                                            } ?>" name="noMobile">
                <span>
                    <?php
                    if (isset($errors)) {
                        if (!empty($errors)) {
                            echo $errors[5];
                        }
                    } ?>

                </span>
                <!---->

                <br>
                <button type="submit" class="submit" name="submit">
                    <h3>التالي</h3>
                </button>
            </form>

        </div>
    </div>
    <script src="../js/app.js"></script>
</body>

</html>