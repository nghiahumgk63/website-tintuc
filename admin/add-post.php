<?php

session_start();
include('../includes/config.php');
include_once('create-url.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    // For adding post  
    if (isset($_POST['submit'])) {
        $title = $_POST['postTitle'];
        $idcate  = $_POST['category'];
        $postContent = $_POST['postContent'];
        $postdetails = $_POST['postDescription'];
        $url = url($title);
        // echo $cate . $url;
        $imgfile = $_FILES["postImage"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        // echo $title . "\n" . $cate . "\n" . $postdetails. "\n" . $url. "\n" . $imgnewfile;
        // echo $postdetails;

        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Định dạng không hợp lệ. Chỉ cho phép định dạng jpg / jpeg / png / gif');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postImage"]["tmp_name"], "post-images/" . $imgnewfile);

            $status = 1;
            // $query = mysqli_query($con, "insert into tblposts(PostTitle,CategoryId,SubCategoryId,PostDetails,PostUrl,Is_Active,PostImage) values('$posttitle','$catid','$subcatid','$postdetails','$url','$status','$imgnewfile')");
            $query = mysqli_query($con, "insert into tintuc(TieuDe,MaTL,MoTa,NoiDung, url, Anh, IsActivate) values('$title','$idcate','$postdetails','$postContent','$url','$imgnewfile','1')");

            if ($query) {
                $msg = "Bài viết đã thêm thành công.";
            } else {
                $error = "Đã xảy ra lỗi vui lòng thử lại";
            }
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

                <div class="form-group">
                    <h5><b>Tiêu đề bài viết</b></h5>
                    <input type="text" class="form-control" id="" name="postTitle" placeholder="Nhập tiêu đề" required>
                </div>

                <div class="form-group">
                    <!--mã thể để auto, chọn thể loại nào thì thêm mã thể loại đó vao csdl-->
                    <h5><b>Thể loại</b></h5>
                    <select class="form-control" name="category" id="" required>
                        <option value="" disabled selected>Chọn thể loại</option>
                        <!--tạo 1 list thể loại vô đây này-->
                        <?php
                        $ret = mysqli_query($con, "select MaTL,TenTL from theloai Where IsActivate = 1");
                        while ($result = mysqli_fetch_array($ret)) {
                        ?>
                            <option value="<?php echo htmlentities($result['MaTL']); ?>"><?php echo htmlentities($result['TenTL']); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!--THÊM PHẦN MÔ TẢ BÀI VIẾT NỮA!!!-->
                <div class="form-group">
                    <h5><b>Mô tả bài viết</b></h5>
                    <div class="card-box">
                        <textarea class="form-control" name="postDescription" placeholder="Mô tả bài viết"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <h5><b>Bài viết</b></h5>
                    <div class="card-box">
                        <textarea class="summernote" name="postContent" placeholder="Nội dung bài viết" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <h5><b>Đăng ảnh</b></h5>
                    <div class="card-box">
                        <input type="file" class="upImg" id="postImage" name="postImage" required>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn-save">Lưu và đăng</button>
                <button type="button" class="btn-box">Hủy</button>
            </form>
        </div>
        </div>
        <script src="../plugins/jquery-3.5.1.min.js"></script>
        <script src="../plugins/popper.min.js"></script>
        <script src="../plugins/bootstrap.min.js"></script>
        <script src="../plugins/summernote/summernote-bs4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.summernote').summernote({
                    placeholder: 'Nội dung',
                    tabsize: 4,
                    height: 200
                });
            });
        </script>

    </body>

    </html>
<?php } ?>