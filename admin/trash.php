<?php
session_start();
include('../includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if ($_GET['action'] = 'restore') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "update tintuc set IsActivate=1 where MaTinTuc='$postid'");
        if ($query) {
            $msg = "Bài viết đã được khôi phục";
        } else {
            $error = "Đã xảy ra lỗi vui lòng thử lại";
        }
    }
    // Code for Forever deletionparmdel
    if ($_GET['presid']) {
        $id = intval($_GET['presid']);
        $query = mysqli_query($con, "delete from tintuc where MaTinTuc ='$id'");
        $delmsg = "Bài viết đã được xóa vĩnh viễn!!!";
    }

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bài viết đã xóa</title>

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
            <h4 class="page-title">Bài viết đã xóa</h4>
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
                        $num = 1;
                        $query = mysqli_query($con, "select MaTinTuc, TieuDe, TenTL from tintuc, theloai where theloai.MaTL=tintuc.MaTL and tintuc.IsActivate=0");
                        $rowcount = mysqli_num_rows($query);
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
                            <tr><td><?php echo htmlentities($num)?></td>
                                <td><b><?php echo htmlentities($row['TieuDe']); ?></b></td>
                                <td><?php echo htmlentities($row['TenTL']) ?></td>
                                <td>
                                    <a href="trash.php?pid=<?php echo htmlentities($row['MaTinTuc']); ?>&&action=restore" onclick="return confirm('Bạn có muốn khôi phục bài viết không ?')"> <img class="icons" src="../images/icons/icons8-undo-48.png"></a>
                                    &nbsp;
                                    <a href="trash.php?presid=<?php echo htmlentities($row['MaTinTuc']); ?>&&action=perdel" onclick="return confirm('Bạn có muốn xóa vĩnh viễn bài viết không ?')"><img class="icons" src="../images/icons/icons8-trash-64.png"></a>
                                </td>
                            </tr>
                    <?php $num++;}
                            } ?>

                    </table>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php } ?>