<?php
session_start();
include('../includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
    header('location:index.php');
}
else
{
    if(isset($_POST['submit']))
    {
        $id=intval($_GET['cid']);
        $name=$_POST['Uname'];
        $oldpwd=$_POST['pwd'];
        $newpwd=$_POST['newpwd'];
        $query = mysqli_query($con, "SELECT password from users where id = '$id'");
        $row = mysqli_fetch_array($query);
        if($row['password'] == $oldpwd){
                $query=mysqli_query($con,"Update users set name='$name',password='$newpwd' where id='$id'");
                if($query)
                {
                    $msg="Cập nhật tài khoản thành công";
                }
                else{
                    $err="Đã xảy ra lỗi, làm ơn thử lại!";    
                } 
            }
        else{
            $err = "Mật khẩu cũ không đúng!";
        }

    }?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đổi mật khẩu</title>

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
            <h4 class="page-title">Đổi mật khẩu</h4>
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
            <?php
                $id = intval($_GET['cid']);
                $query = mysqli_query($con, "select name from users where id = $id");
                while($row = mysqli_fetch_array($query))
            {?>
            <form action="" class="form" name="addUser" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <h5><b>Tên người dùng</b></h5>
                    <input type="text" class="form-control" value="<?php echo htmlentities($row['name']); ?>" name="Uname" placeholder="Nhập tên người dùng" readonly required>
                </div>

                <div class="form-group">
                    <h5><b>Mật khẩu cũ</b></h5>
                    <input type="password" class="form-control" name="pwd" placeholder="Nhập mật khẩu cũ" required>
                </div>
                
                <div class="form-group">
                    <h5><b>Mật khẩu mới</b></h5>
                    <input type="password" class="form-control" onkeyup="check();" id ="newpass" name="newpwd" placeholder="Nhập mật khẩu mới" required>
                </div>
                <div class="form-group">
                    <h5><b>Nhập lại mật khẩu</b>&nbsp;&nbsp;<span id ="message"></span></h5>
                    <input type="password" class="form-control" onkeyup="check();" id="confirmpass" name="renewpwd" placeholder="Nhập lại mật khẩu" required>
                </div>
                <?php } ?>
                <button type="submit" name="submit" class="btn-save">Update</button>
            </form>
        </div>
        </div>
        <script src="js/checkpass.js"></script>
    </body>
</html>
<?php } ?>