<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if($_GET['action']=='del' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"update users set IsActivate=0 where id=$id");
	$msg="Đã xóa tài khoản này";
}
// Code for restore
if($_GET['resid'])
{
	$id=intval($_GET['resid']);
	$query=mysqli_query($con,"update users set IsActivate=1 where id=$id");
	$msg="Đã khôi phục tài khoản";
}

// Code for Forever deletionparmdel
if($_GET['action']=='parmdel' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"delete from  users  where id=$id");
	$delmsg="Tài khoản đã được xóa vĩnh viễn";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý người dùng</title>

        <link href="css/manager.css" rel="stylesheet" type="text/css"/>
        <link href="css/button.css" rel="stylesheet" type="text/css" />
        <link href="css/alerts.css" rel="stylesheet" type="text/css" />

    </head>
    <body height = 100%>
        <!--div class="top-bar">
        <div class="main">
            <div class="main-left" lưu hết mấy phần này trong manager-->
            <?php include('manager.php');?>
            <div class="main-right">
                <h4 class="page-title">Quản lý người dùng</h4>
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
                        <strong>Hmm!</strong> <?php echo htmlentities($delmsg); ?></div>
                <?php } ?>
            </div>
                <form class="form" name="manage-user" method="get" enctype="multipart/form-data">
                    <div class="form-group1">
                        <table class="table-trash">
                            <tr class="color1">                                       
                                <th>#</th>
                                <th>Họ và tên</th>
                                <th>Username</th>
                                <th>Tác vụ</th>
                            </tr>
                            <?php
                    $query = mysqli_query($con, "Select id, username,name from users where IsActivate = 1");
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
                            <td><?php echo htmlentities($row['name']); ?></td>
                            <td><?php echo htmlentities($row['username']); ?></td>
                            <td><a href="change-password.php?cid=<?php echo htmlentities($row['id']);?>"><img class = "icons" src="../images/icons/icons8-edit-64.png" alt="" srcset=""></a> 
	&nbsp;<a href="manage-users.php?rid=<?php echo htmlentities($row['id']);?>&&action=del"> <img class = "icons" src="../images/icons/icons8-trash-64.png" alt="" srcset=""></a> </td>
</tr>
                    <?php
                        $cnt++;
                    }} ?>

                        </table>
                    </div>
                </form>
                <h4 class="page-title">Người dùng đã xóa</h4>
                <form class="form" name="addPost" method="post" enctype="multipart/form-data">
                    <div class="form-group1">
                        <table class="table-trash">
                            <tr class="color1">                                       
                                <th>#</th>
                                <th>Họ và tên</th>
                                <th>Username</th>
                                <th>Tác vụ</th>
                            </tr>
                            <?php 
$query=mysqli_query($con,"Select id, username,name from users where IsActivate = 0");
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
<td><?php echo htmlentities($row['name']); ?></td>
<td><?php echo htmlentities($row['username']); ?></td>

<td><a href="manage-users.php?resid=<?php echo htmlentities($row['id']);?>"><img class = "icons" src="../images/icons/icons8-undo-48.png"></a> 
	&nbsp;<a href="manage-users.php?rid=<?php echo htmlentities($row['id']);?>&&action=parmdel" title="Xóa vĩnh viễn"> <img class = "icons" src="../images/icons/icons8-trash-64.png"> </td>
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