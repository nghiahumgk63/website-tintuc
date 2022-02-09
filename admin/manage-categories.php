<?php
session_start();
include('../includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if($_GET['action']=='del' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"update theloai set IsActivate=0 where MaTL=$id");
	$msg="Đã xóa thể loại này";
}
// Code for restore
if($_GET['resid'])
{
	$id=intval($_GET['resid']);
	$query=mysqli_query($con,"update theloai set IsActivate=1 where MaTL=$id");
	$msg="Khôi phục thể loại thành công";
}

// Code for Forever deletionparmdel
if($_GET['action']=='parmdel' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"delete from  theloai  where MaTL=$id");
	$delmsg="Thể loại đã được xóa vĩnh viễn";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thể loại</title>

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
        <h4 class="page-title">Quản lý thể loại</h4>
        <div>
                <!---Success Message--->
                <?php if ($msg) { ?>
                    <div class="alerts success">
                        <strong>Đã xong!</strong> <?php echo htmlentities($msg); ?>
                    </div>
                <?php } ?>
                <!---Error Message--->
                <?php if ($delmsg) { ?>
                    <div class="alerts fail">
                        <strong>Ôi!</strong> <?php echo htmlentities($delmsg); ?>
                    </div>
                <?php } ?>
            </div>
        <form class="form" name="managerCategories" method="get" enctype="multipart/form-data">
            <div class="form-group1">
                <table class="table-trash">
                    <tr class="color1">
                        <th>#</th>
                        <th>Tên thể loại</th>
                        <th>Mô tả</th>
                        <th>Ngày đăng</th>
                        <th>Ngày sửa</th>
                        <th>Tác vụ</th>
                    </tr>
                    <?php
                    $query = mysqli_query($con, "Select MaTL, TenTL,MoTa, NgayTao, NgayCapNhat from theloai where IsActivate = 1");
                    $cnt = 1;
                    $rowCount = mysqli_num_rows($query);
                    if($rowCount == 0)
                    {?>
                        <tr>
                        <td colspan="5" align="center">
                            <h3 style="color:red">No record found</h3>
                        </td>
                    </tr>
                    <?php
                    } else {
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                        <tr>
                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                            <td><?php echo htmlentities($row['TenTL']); ?></td>
                            <td><?php echo htmlentities($row['MoTa']); ?></td>
                            <td><?php echo htmlentities($row['NgayTao']); ?></td>
                            <td><?php echo htmlentities($row['NgayCapNhat']); ?></td>
                            <td><a href="edit-category.php?cid=<?php echo htmlentities($row['MaTL']);?>"><img class = "icons" src="../images/icons/icons8-edit-64.png" alt="" srcset=""></a> 
	&nbsp;<a href="manage-categories.php?rid=<?php echo htmlentities($row['MaTL']);?>&&action=del"> <img class = "icons" src="../images//icons/icons8-trash-64.png" alt="" srcset=""></a> </td>
</tr>
                    <?php
                        $cnt++;
                    }} ?>
                </table>
            </div>
        </form>
        <h4 class="page-title">Thể loại đã xóa</h4>
        <form class="form" name="addPost" method="post" enctype="multipart/form-data">
            <div class="form-group1">
                <table class="table-trash">
                    <tr class="color1">
                        <th>#</th>
                        <th>Tên thể loại</th>
                        <th>Mô tả</th>
                        <th>Ngày đăng</th>
                        <th>Ngày sửa</th>
                        <th>Tác vụ</th>
                    </tr>
                    <?php 
$query=mysqli_query($con,"Select MaTL,TenTL,MoTa,NgayTao,NgayCapNhat from theloai where IsActivate=0");
$rowCount = mysqli_num_rows($query);
$cnt=1;
if($rowCount == 0)
{?>
    <tr>
    <td colspan="5" align="center">
        <h3 style="color:red">No record found</h3>
    </td>
</tr>
<?php
}else{
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($row['TenTL']);?></td>
<td><?php echo htmlentities($row['MoTa']);?></td>
<td><?php echo htmlentities($row['NgayTao']);?></td>
<td><?php echo htmlentities($row['NgayCapNhat']);?></td>
<td><a href="manage-categories.php?resid=<?php echo htmlentities($row['MaTL']);?>"><img class = "icons" src="../images/icons/icons8-undo-48.png"</a> 
	&nbsp;<a href="manage-categories.php?rid=<?php echo htmlentities($row['MaTL']);?>&&action=parmdel" title="Xóa vĩnh viễn"> <img class = "icons" src="../images/icons/icons8-trash-64.png" </td>
</tr></tr>
<?php
$cnt++;
 }} ?>

                </table>
            </div>
        </form>
    </div>
</body>
</html>
<?php } ?>