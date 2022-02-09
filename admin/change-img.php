<?php
session_start();
include('../includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $imgfile = $_FILES["postImage"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Định dạng không hợp lệ. Chỉ cho phép định dạng jpg / jpeg / png / gif');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postImage"]["tmp_name"], "post-images/" . $imgnewfile);
            $postid = intval($_GET['pid']);
            $query = mysqli_query($con, "update tintuc set Anh='$imgnewfile' where MaTinTuc='$postid'");
            if ($query) {
                $msg = "Ảnh dã được cập nhật";
            } else {
                $error = "Đã xảy ra lỗi vui lòng thử lại.";
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/button.css" rel="stylesheet" type="text/css" />
        <link href="css/alerts.css" rel="stylesheet">
        <link href="css/manager.css" rel="stylesheet" type="text/css" />

    </head>

    <body height=100%>
        <!--div class="top-bar">
        <div class="main">
            <div class="main-left" lưu hết mấy phần này trong manager-->
        <?php include('manager.php'); ?>

        <div class="main-right">

            <h4 class="page-title">Thay đôi ảnh</h4>
            <div>
                <!---Success Message--->
                <?php if ($msg) { ?>
                    <div class="alerts success">
                        <strong>OK!</strong> <?php echo htmlentities($msg); ?>
                    </div>
                <?php } ?>
                <!---Error Message--->
                <?php if ($error) { ?>
                    <div class="alerts fail">
                        <strong>Ôi!</strong> <?php echo htmlentities($error); ?></div>
                <?php } ?>
            </div>
            <!--mã thì để auto đi-->
            <form action="" class="form" name="addPost" method="post" enctype="multipart/form-data">
                <?php
                $postid = intval($_GET['pid']);
                $query = mysqli_query($con, "select Anh,TieuDe from tintuc where MaTinTuc='$postid' and IsActivate=1 ");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="form-group">
                        <h5><b>Tiêu đề bài viết</b></h5>
                        <input type="text" class="form-control" id="" name="postTitle" value="<?php echo htmlentities($row['TieuDe']); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <!--mã thể để auto, chọn thể loại nào thì thêm mã thể loại đó vao csdl-->
                        <h5><b>Ảnh</b></h5>
                        <img src="post-images/<?php echo htmlentities($row['Anh']); ?>" width="300" />
                        <br />
                    </div>
                <?php } ?>

                <div class="form-group">
                    <h5><b>Ảnh mới</b></h5>
                    <div class="card-box">
                        <input type="file" class="upImg" id="postImage" name="postImage" required>
                    </div>
                </div>

                <button type="submit" name="update" class="btn-save">Update</button>
            </form>

    </body>

    </html>
<?php } ?>