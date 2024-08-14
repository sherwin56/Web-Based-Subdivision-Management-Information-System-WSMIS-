<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>San Marino Classic</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Masthead-->
<div class="masthead">
    <div class="masthead-content text-white">
        <div class="container-fluid px-4 px-lg-0">
            <h1 class="fst-italic lh-1 mb-4">Welcome to San Marino Classic</h1>
            <p class="mb-5">This website was created to provide your needs from the comfort of your home!</p>

            <form method="post">
                <form id="contactForm">
                    <div class="row input-group-newsletter">
                        <div class="col"><input class="form-control" id="email" placeholder="Enter Username..." name="txt_username"/></div>
                        <div class="col2"><input class="form-control" id="email" type="password" placeholder="Enter Password..." name="txt_password"/></div>
                        <div class="col-auto2"><button class="btn btn-sm btn-primary" id="submitButton" type="submit" name="btn_login">Login</button></div>
                        <label id="error" class="label label-danger pull-right"></label>
                    </div>
                </form>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

<?php
include "pages/connection.php";
if(isset($_POST['btn_login']))
{
    $username = $_POST['txt_username'];
    $password = $_POST['txt_password'];


    $admin = mysqli_query($con, "SELECT * from tbluser where username = '$username' and password = '$password' and type = 'administrator' ");
    $numrow_admin = mysqli_num_rows($admin);

    $resident = mysqli_query($con, "SELECT * from tblresident where username = '$username' and password = '$password'");
    $numrow_resident = mysqli_num_rows($resident);



    if($numrow_admin > 0)
    {
        while($row = mysqli_fetch_array($admin)){
            $_SESSION['role'] = "Administrator";
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['username'];

        }
        header ('location: pages/dashboard/dashboard.php');
    }

    elseif($numrow_resident > 0)
    {
        while($row = mysqli_fetch_array($resident)){
            $_SESSION['role'] = $row['fname'];
            $_SESSION['resident'] = 1;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['username'];
        }
        header ('location: pages/activity/activity.php');
    }
    else
    {
        echo '<script type="text/javascript">document.getElementById("error").innerHTML = "Invalid Account";</script>';

    }

}

?>
</body>
</html>
