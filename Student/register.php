<?php
    require_once '../dbcon.php';
    session_start();
    if(isset($_SESSION['student_login'])){
         header('location: index.php');
    }
    if(isset($_POST['student_register'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $roll = $_POST['roll'];
        $reg = $_POST['reg'];
        $phone = $_POST['phone'];

        $inputs_erros = array();
        if(empty($fname)){
            $inputs_erros['fname'] = "Fast name Field Required !!";
        }
        if(empty($lname)){
            $inputs_erros['lname'] = "last name Field Required !!";
        }
        if(empty($email)){
            $inputs_erros['email'] = "Email Field Required !!";
        }
        if(empty($username)){
            $inputs_erros['username'] = "username Field Required !!";
        }
        if(empty($password)){
            $inputs_erros['password'] = "Password Field Required !!";
        }
        if(empty($roll)){
            $inputs_erros['roll'] = "Roll Field Required !!";
        }
        if(empty($reg)){
            $inputs_erros['reg'] = "Reg Field Required !!";
        }
        if(empty($phone)){
            $inputs_erros['phone'] = "Phone Field Required !!";
        }
        if(count($inputs_erros) == 0){
           $email_check = mysqli_query($con , "SELECT * FROM `students` WHERE `email` = '$email'");
           $email_check_row = mysqli_num_rows($email_check);

           if ($email_check_row == 0) {
            $username_check = mysqli_query($con , "SELECT * FROM `students` WHERE `username`= '$username'");

                $username_check_row = mysqli_num_rows($username_check);

                if($username_check_row == 0){
                    if(strlen($username) >= 6){
                        if(strlen($password) >= 6){

                            $password_hash = password_hash($password , PASSWORD_DEFAULT);

                            $sql = "INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `status`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','$phone','0')";

                            $result = mysqli_query($con , $sql);
                            if($result){
                                $success = "Registration Successfully !!";
                            }else{
                                $error = "Somthing Wrong !";
                            }
                            
                        }else{
                            $password_error = "This password more Then 6 Carecters";
                        }
                    }else{
                        $username_exists = "This username more Then 6 Carecters";
                    }
                }else{
                    $username_exists = "This username Already Exists";
                }
           }
           else{
               $email_exists = "This Email Already Exists";
           }  
        }

       // $sql = "INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `status`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','$phone','0')";
       // $result = mysqli_query($con , $sql);

    }
?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student Registration</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LMS</h1>
            <?php
                if(isset($success)){?>
                    <div class="alert alert-success" role="alert">
                        <?= $success ;?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
            ?>
            <?php
                if(isset($error)){?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ;?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
            ?>
            <?php
                if(isset($email_exists)){?>
                    <div class="alert alert-danger" role="alert">
                        <?= $email_exists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
            ?>
            <?php
                if(isset($username_exists)){?>
                    <div class="alert alert-danger" role="alert">
                        <?= $username_exists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
            ?>
            <?php
                if(isset($password_error)){?>
                    <div class="alert alert-danger" role="alert">
                        <?= $password_error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
            ?>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?= isset($fname) ? $fname:'' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                                if (isset($inputs_erros['fname'])) {
                                    echo '<span class="input_error">'.$inputs_erros['fname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?= isset($lname) ? $lname:'' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                                if (isset($inputs_erros['lname'])) {
                                    echo '<span class="input_error">'.$inputs_erros['lname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($email) ? $email:'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                                if (isset($inputs_erros['email'])) {
                                    echo '<span class="input_error">'.$inputs_erros['email'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="User Name" name="username" value="<?= isset($username) ? $username:'' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                                if (isset($inputs_erros['username'])) {
                                    echo '<span class="input_error">'.$inputs_erros['username'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password" value="<?= isset($password) ? $password:'' ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                                if (isset($inputs_erros['password'])) {
                                    echo '<span class="input_error">'.$inputs_erros['password'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Roll No" name="roll" parent="[0-9]{6}" value="<?= isset($roll) ? $roll:'' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                                if (isset($inputs_erros['roll'])) {
                                    echo '<span class="input_error">'.$inputs_erros['roll'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Reg No" name="reg" parent="[0-9]{6}" value="<?= isset($reg) ? $reg:'' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                                if (isset($inputs_erros['reg'])) {
                                    echo '<span class="input_error">'.$inputs_erros['reg'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="01*********" name="phone" parent="01[1|5|6|7|8|9][0-9]{8}" value="<?= isset($phone) ? $phone:'' ?>">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php
                                if (isset($inputs_erros['phone'])) {
                                    echo '<span class="input_error">'.$inputs_erros['phone'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                           <input class="btn btn-primary btn-block" type="submit" value="Register" name="student_register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>
