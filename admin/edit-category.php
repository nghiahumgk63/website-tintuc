<?php
session_start();
include('../includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
    header('location:index.php');
}
else{
    if(isset($_POST['submit']))
    {
        $catid=intval($_GET['cid']);
        $category=$_POST['category'];
        $description=$_POST['categoryDescription'];
        $query=mysqli_query($con,"Update theloai set TenTL='$category',MoTa='$description' where MaTL='$catid'");
        if($query)
        {
            $msg="Thể loại đã được cập nhật thành công";
        }
        else{
            $err="Đã xảy ra lỗi làm ơn thử lại";    
        } 
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thể loại</title>

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
        <h4 class="page-title">Sửa thể loại</h4>
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
        <?php 
        $catid=intval($_GET['cid']);
        $query=mysqli_query($con,"Select MaTL,TenTL,MoTa,NgayTao,NgayCapNhat from  theloai where IsActivate=1 and MaTL='$catid'");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?>
        <form class="form" name="editCategory" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h5><b>Tên thể loại</b></h5>
                <input type="text" class="form-control" value="<?php echo htmlentities($row['TenTL']); ?>"
                    name="category" placeholder="Nhập tên thể loại" required>
            </div>

            <div class="form-group">
                <h5><b>Mô tả thể loại</b></h5>
                <div class="card-box">
                    <textarea class="form-control" <?php echo htmlentities($row['MoTa']); ?> name="categoryDescription"
                        placeholder="Mô tả thể loại" required></textarea>
                </div>
            </div>
        <?php } ?>
            <button type="submit" name="submit" class="btn-save">Update</button>
        </form>

    </div>
</body>

</html>
<?php } ?>