<?php
session_start();
include("../includes/config.php");
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header("location:index.php");
} else {
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $Des = $_POST['categoryDescription'];
        $sql = mysqli_query($con, "SELECT TenTL FROM theloai WHERE '$category' = `TenTL`");
        $num = mysqli_fetch_array($sql);
        unset($sql);
        if ($num == 0) {
            $sql = mysqli_query($con, "INSERT INTO theloai(TenTL, MoTa, IsActivate) VALUES('$category','$Des', 1)");
            if ($sql) {
                $msg = "Thêm thể loại mới thành công!";
            } else {
                $err = "Thêm thể loại mới thất bại!";
            }
        } else {
            $err = "Thể loại đã tồn tại!";
        }
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm thể loại</title>

        <link href="css/manager.css" rel="stylesheet" type="text/css" />
        <link href="css/button.css" rel="stylesheet" type="text/css" />
        <link href="css/alerts.css" rel="stylesheet" type="text/css" />

    </head>

    <body height=100%>
        <!--div class="top-bar">
        <div class="main">
            <div class="main-left" lưu hết mấy phần này trong manager-->
        <?php include('manager.php'); ?>
        <div class="main-right">
            <h4 class="page-title">Thêm Thể loại</h4>
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
            <form class="form" name="addCategory" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <h5><b>Tên thể loại</b></h5>
                    <input type="text" class="form-control" id="" name="category" placeholder="Nhập tên thể loại" required>
                </div>

                <div class="form-group">
                    <h5><b>Mô tả thể loại</b></h5>
                    <div class="card-box">
                        <textarea class="form-control" name="categoryDescription" placeholder="Mô tả thể loại" required></textarea>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn-save">OK</button>
                <button type="button" class="btn-box">Hủy</button>
            </form>
        </div>
    </body>

    </html>
<?php } ?>