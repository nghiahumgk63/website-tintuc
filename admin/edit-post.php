<?php
session_start();
include('../includes/config.php');
include_once('create-url.php');
// error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $posttitle = $_POST['postTitle'];
        $catid = $_POST['category'];
        $postdetails = $_POST['postDescription'];
        $postContent = $_POST['postContent'];
        $url = url($posttitle);
        $status = 1;
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "update tintuc set TieuDe='$posttitle',MaTL='$catid',MoTa='$postdetails',NoiDung='$postContent' ,IsActivate='$status' where MaTinTuc='$postid'");
        if ($query) {
            $msg = "Bài viết đã cập nhật";
        } else {
            $error = "Đã xảy ra lỗi vui lòng thử lại";
        }
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm bài viết</title>
        <link href="../plugins/bootstrap.min.css" rel="stylesheet">
        <link href="../plugins/summernote/summernote-bs4.min.css" rel="stylesheet">
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

            <h4 class="page-title">Thêm bài viết</h4>
            <div>
                <!---Success Message--->
                <?php if ($msg) { ?>
                    <div class="alerts success">
                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                    </div>
                <?php } ?>
                <!---Error Message--->
                <?php if ($error) { ?>
                    <div class="alerts fail">
                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?></div>
                <?php } ?>
            </div>
            <!--mã thì để auto đi-->
            <?php
            $postid = intval($_GET['pid']);
            $query = mysqli_query($con, "select MaTinTuc, Anh, TieuDe, tintuc.MoTa,NoiDung, theloai.TenTL, theloai.MaTL from tintuc, theloai where tintuc.MaTL = theloai.MaTL and MaTinTuc='$postid' and tintuc.IsActivate=1 ");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <form action="" class="form" name="editPost" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <h5><b>Tiêu đề bài viết</b></h5>
                        <input type="text" class="form-control" id="" value="<?php echo htmlentities($row['TieuDe']) ?>" name="postTitle" placeholder="Nhập tiêu đề" required>
                    </div>

                    <div class="form-group">
                        <!--mã thể để auto, chọn thể loại nào thì thêm mã thể loại đó vao csdl-->
                        <h5><b>Thể loại</b></h5>
                        <select class="form-control" name="category" id="" required>
                            <!-- <option value="" disabled selected>Chọn thể loại</option> -->
                            <!--tạo 1 list thể loại vô đây này-->
                            <option value="<?php echo htmlentities($row['MaTL']); ?>"><?php echo htmlentities($row['TenTL']); ?></option>

                            <?php

                            $ret = mysqli_query($con, "select MaTL,TenTL from theloai Where IsActivate = 1");
                            while ($result = mysqli_fetch_array($ret)) { ?>
                                <option value="<?php echo htmlentities($result['MaTL']); ?>"><?php echo htmlentities($result['TenTL']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--THÊM PHẦN MÔ TẢ BÀI VIẾT NỮA!!!-->
                    <div class="form-group">
                        <h5><b>Mô tả bài viết</b></h5>
                        <div class="card-box">
                            <textarea class="form-control" name="postDescription" placeholder="Mô tả bài viết"><?php echo htmlentities($row['MoTa']) ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5><b>Bài viết</b></h5>
                        <div class="card-box">
                            <textarea id="summernote" name="postContent" placeholder="Nội dung bài viết" required><?php echo htmlentities($row['NoiDung']) ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5><b>Đăng ảnh</b></h5>
                        <div class="card-box">
                            <img src="post-images/<?php echo htmlentities($row['Anh']); ?>" height="150" />
                            <br />
                            <a class="btn-save" href="change-img.php?pid=<?php echo htmlentities($row['MaTinTuc']); ?>">Update Image</a>
                        </div>
                    </div>
                <?php } ?>
                <button type="submit" name="submit" class="btn-save">Lưu và đăng</button>
                <button type="button" class="btn-box">Hủy</button>
                </form>
        </div>
        </div>
        <script src="../plugins/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="../plugins/popper.min.js"></script>
        <script src="../plugins/bootstrap.min.js"></script>
        <script src="../plugins/summernote/summernote-bs4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Nội dung',
                    tabsize: 4,
                    height: 200
                });
            });
        </script>
    </body>

    </html>
<?php } ?>