<?php
session_start();
include("../includes/config.php");
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header("location:index.php");
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['Uname'];
        $username = $_POST['Username'];
        $pw = $_POST['pw'];
        $repw = $_POST['repw'];
        $sql = mysqli_query($con, "SELECT `username`, `name` FROM users  WHERE `username` = '$username' || `name` = '$name' ");
        $num = mysqli_fetch_array($sql);
        unset($sql);
        if ($num == 0) {
            if ($pw == $repw) {
                $sql = mysqli_query($con, "INSERT INTO users(name, username, password, IsActivate) values('$name', '$username','$pw',1)");
                if ($sql) {
                    $msg = "Tạo tài khoản thành công";
                } else {
                    $err = "Tạo tài khoản thất bại";
                }
            } else {
                $err = "Mật khẩu nhập lại không khớp";
            }
        } else {
            $err = "Tài khoản đã tồn tại";
        }
    }

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm người dùng</title>

        <link href="css/manager.css" rel="stylesheet" type="text/css"/>
        <link href="css/button.css" rel="stylesheet" type="text/css"/>
        <link href="css/alerts.css" rel="stylesheet" type="text/css"/>

    </head>

    <body height=100%>
        <!--div class="top-bar">
        <div class="main">
            <div class="main-left" lưu hết mấy phần này trong manager-->
        <?php include('manager.php'); ?>
        <div class="main-right">
            <h4 class="page-title">Thêm người dùng</h4>
            <div>
                <?php if ($msg) { ?>
                    <div class="alerts success">
                        <strong>Đã xong!</strong><?php echo htmlentities($msg); ?>
                    </div>
                <?php } ?>
                <?php if ($err) { ?>
                    <div class="alerts fail">
                        <strong>Ôi!</strong><?php echo htmlentities($err); ?>
                    </div>
                <?php } ?>
            </div>
            <!--mã thì để auto đi-->
            <form action="" class="form" name="addUser" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <h5><b>Tên người dùng</b></h5>
                    <input type="text" class="form-control" name="Uname" placeholder="Nhập tên người dùng" required>
                </div>

                <div class="form-group">
                    <h5><b>Tên đăng nhập</b></h5>
                    <input type="text" class="form-control" name="Username" placeholder="Nhập tên đăng nhập" required>
                </div>

                <div class="form-group">
                    <h5><b>Mật khẩu</b></h5>
                    <input type="password" class="form-control" name="pw" placeholder="Nhập mật khẩu" required>
                </div>

                <div class="form-group">
                    <h5><b>Nhập lại mật khẩu</b></h5>
                    <input type="password" class="form-control" name="repw" placeholder="Nhập lại mật khẩu" required>
                </div>

                <button type="submit" name="submit" class="btn-save">OK</button>
                <button type="button" class="btn-box">Hủy</button>
            </form>
        </div>
        </div>
    </body>

    </html>
<?php } ?>