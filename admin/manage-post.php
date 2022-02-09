<?php
session_start();
include('../includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if ($_GET['action'] = 'del') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "update tintuc set IsActivate=0 where MaTinTuc='$postid'");
        // $msg = "Đã xóa bài viết ";
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý bài viết</title>

        <link href="css/manager.css" rel="stylesheet" type="text/css" />
        <link href="css/button.css" rel="stylesheet" type="text/css" />
    </head>

    <body height=100%>
        <!--div class="top-bar">
        <div class="main">
            <div class="main-left" lưu hết mấy phần này trong manager-->
        <?php include('manager.php'); ?>
        <div class="main-right">
            <h4 class="page-title">Quản lý bài viết</h4>
            <div>
                <!---Success Message--->
                <?php if ($msg) { ?>
                    <div class="alerts success">
                        <strong>Đã xong!</strong> <?php echo htmlentities($msg); ?>
                    </div>
                <?php } ?>
                <!---Error Message--->
                <?php if ($error) { ?>
                    <div class="alerts fail">
                        <strong>Ôi!</strong> <?php echo htmlentities($error); ?>
                    </div>
                <?php } ?>
            </div>
            <form class="form" name="addPost" method="post" enctype="multipart/form-data">
                <div class="form-group1">
                    <table class="table-trash">
                        <tr class="color1">
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Thể loại</th>
                            <th>Tác vụ</th>
                        </tr>
                        <?php
                        $query = mysqli_query($con, "select MaTinTuc, TieuDe, TenTL from tintuc, theloai where theloai.MaTL=tintuc.MaTL and tintuc.IsActivate=1");
                        $rowcount = mysqli_num_rows($query);
                        $cnt = 1;
                        if ($rowcount == 0) {
                        ?>
                            <tr>
                                <td colspan="4" align="center">
                                    <h3 style="color:red">No record found</h3>
                                </td>
                            <tr>
                                <?php
                            } else {
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                            <tr>
                                <th><?php echo htmlentities($cnt); ?></th>
                                <td><b><?php echo htmlentities($row['TieuDe']); ?></b></td>
                                <td><?php echo htmlentities($row['TenTL']) ?></td>
                                <td><a href="edit-post.php?pid=<?php echo htmlentities($row['MaTinTuc']); ?>"><img class="icons" src="../images/icons/icons8-edit-64.png" alt="" srcset=""></a>
                                    &nbsp;<a href="manage-post.php?pid=<?php echo htmlentities($row['MaTinTuc']); ?>&&action=del" onclick="return confirm('Bạn có thực sự muốn xóa?')"> <img class="icons" src="../images/icons/icons8-trash-64.png" alt="" srcset=""></a> </td>
                            </tr>
                    <?php $cnt++;
                                }
                            } ?>
                    </table>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php } ?>