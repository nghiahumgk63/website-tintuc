<?php
session_start();
include('../includes/config.php');
// Nếu nhấn nút login thì mới xử lý
if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];
    // kiểm  tra username và password
    $sql = mysqli_query($con, "SELECT `id`, `username`, `password`, `name` FROM users  WHERE `username` = '$uname' ");
    $num = mysqli_fetch_array($sql);
    $name = $num['name'];
    $_SESSION['name'] = $name;
    $id = $num['id'];
    $_SESSION['id'] = $id;
    if ($num > 0) //nếu có hơn 0 username trùng
    {
        $pw = $num['password']; // lưu mât khẩu vào biến pw
        // so sánh đối chiếu mật khẩu
        // if (password_verify($password, $pw)) {
        if ($password == $pw) {
            $_SESSION['login'] = $_POST['username'];
            echo "<script type='text/javascript'> document.location = 'add-post.php'; </script>";
            //đúng thì đến trang dashboard.php
        } else {
            echo "<script>alert('Mật khẩu sai');</script>";
        }
    }
    //nếu username không trùng thông báo:
    else {
        echo "<script>alert('Tên người dùng sai');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>

    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link href="css/button.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <div class="container">

        </div>
    </header>
    <main>
        <div class="container">
            <form class="login-form" action="" method="post">
                <h1 align="center">HUMG news</h1>
                <div class="input-box">
                    <i></i>
                    <input class="form-control" type="text" required="" name="username" placeholder="Nhập username" autocomplete="off">
                </div>
                <div class="input-box">
                    <i></i>
                    <input class="form-control" type="password" name="password" required="" placeholder="Nhập mật khẩu" autocomplete="off">
                </div>
                <div align="center">
                    <button type="submit" name="login" class="btn-box" align="center">Đăng nhập</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <div class="container">

        </div>
    </footer>
</body>

</html>