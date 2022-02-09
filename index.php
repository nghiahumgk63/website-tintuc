<?php
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUMG News</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
     <!-- Navigation -->
   <?php include('includes/header.php');?>
   
      <!--link-->
    <?php include('includes/link.php');?>
	
    

    <div class="main">

        <div class="left">
            <div class="left_1">
                <a href="thethao.php">
                    <h3 style="font-family: 'Times New Roman', Times, serif; color:red">Thể thao</h3>
                </a>
                <ul>
                    <?php
                    $query = mysqli_query($con, "select MaTinTuc, TieuDe, tintuc.MoTa, Anh, NgayDang, url from tintuc, theloai where theloai.MaTL = tintuc.MaTL and theloai.TenTL = 'Thể thao'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <li>
                            <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                <img src="admin/post-images/<?php echo htmlentities($row['Anh']) ?>" style="width: 200px; height: 150px;" />
                            </a>
                            <h2>
                                <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                    <?php echo htmlentities($row['TieuDe']) ?>
                                </a>
                            </h2>
                            <p style=" font-size:13px; color:gray; "><?php echo htmlentities($row['NgayDang']) ?></p>
                            <p style=" font-size:13px; color:gray;margin-bottom: 60px; "><?php echo htmlentities($row['MoTa']) ?></p>
                        </li>
                    <?php } ?>

                </ul>
            </div>
			
		<div class="left_1">
                <a href="thoisu.php">
                    <h3 style="font-family: 'Times New Roman', Times, serif; color:red">Thời sự</h3>
                </a>
               <ul>
                    <?php
                    $query = mysqli_query($con, "select MaTinTuc, TieuDe, tintuc.MoTa, Anh, NgayDang, url from tintuc, theloai where theloai.MaTL = tintuc.MaTL and theloai.TenTL = 'Thời sự'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <li>
                            <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                <img src="admin/post-images/<?php echo htmlentities($row['Anh']) ?>" style="width: 200px; height: 150px;" />
                            </a>
                            <h2>
                                <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                    <?php echo htmlentities($row['TieuDe']) ?>
                                </a>
                            </h2>
                            <p style=" font-size:13px; color:gray; "><?php echo htmlentities($row['NgayDang']) ?></p>
                            <p style=" font-size:13px; color:gray;margin-bottom: 60px; "><?php echo htmlentities($row['MoTa']) ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
			<div class="left_1">
                <a href="giaitri.php">
                    <h3 style="font-family: 'Times New Roman', Times, serif; color:red">Giải trí</h3>
                </a>
               <ul>
                    <?php
                    $query = mysqli_query($con, "select MaTinTuc, TieuDe, tintuc.MoTa, Anh, NgayDang, url from tintuc, theloai where theloai.MaTL = tintuc.MaTL and theloai.TenTL = 'Giải trí'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <li>
                            <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                <img src="admin/post-images/<?php echo htmlentities($row['Anh']) ?>" style="width: 200px; height: 150px;" />
                            </a>
                            <h2>
                                <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                    <?php echo htmlentities($row['TieuDe']) ?>
                                </a>
                            </h2>
                            <p style=" font-size:13px; color:gray; "><?php echo htmlentities($row['NgayDang']) ?></p>
                            <p style=" font-size:13px; color:gray;margin-bottom: 60px; "><?php echo htmlentities($row['MoTa']) ?></p>
                        </li>
                    <?php } ?>

                </ul>
            </div>
			<div class="left_1">
                <a href="khoahoc.php">
                    <h3 style="font-family: 'Times New Roman', Times, serif; color:red">Khoa học</h3>
                </a>
               <ul>
                    <?php
                    $query = mysqli_query($con, "select MaTinTuc, TieuDe, tintuc.MoTa, Anh, NgayDang, url from tintuc, theloai where theloai.MaTL = tintuc.MaTL and theloai.TenTL = 'Khoa học'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <li>
                            <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                <img src="admin/post-images/<?php echo htmlentities($row['Anh']) ?>" style="width: 200px; height: 150px;" />
                            </a>
                            <h2>
                                <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                    <?php echo htmlentities($row['TieuDe']) ?>
                                </a>
                            </h2>
                            <p style=" font-size:13px; color:gray; "><?php echo htmlentities($row['NgayDang']) ?></p>
                            <p style=" font-size:13px; color:gray;margin-bottom: 60px; "><?php echo htmlentities($row['MoTa']) ?></p>
                        </li>
                    <?php } ?>

                </ul>
            </div>
			<div class="left_1">
                <a href="congnghe.php">
                    <h3 style="font-family: 'Times New Roman', Times, serif; color:red">Công nghệ</h3>
                </a>
               <ul>
                    <?php
                    $query = mysqli_query($con, "select MaTinTuc, TieuDe, tintuc.MoTa, Anh, NgayDang, url from tintuc, theloai where theloai.MaTL = tintuc.MaTL and theloai.TenTL = 'Cộng nghệ'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <li>
                            <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                <img src="admin/post-images/<?php echo htmlentities($row['Anh']) ?>" style="width: 200px; height: 150px;" />
                            </a>
                            <h2>
                                <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                    <?php echo htmlentities($row['TieuDe']) ?>
                                </a>
                            </h2>
                            <p style=" font-size:13px; color:gray; "><?php echo htmlentities($row['NgayDang']) ?></p>
                            <p style=" font-size:13px; color:gray;margin-bottom: 60px; "><?php echo htmlentities($row['MoTa']) ?></p>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            
            
            
            
            
        </div>
        <div class="right">
            <div class="quangcao">
                <li><a href="https://www.asus.com/vn/" >
                    <img src="images/quangcao.png" alt="quang cao" style=" height: 550px; width: 300px; margin-top: 0px;">
                </a></li>
            </div>
            <div class="danhmuc">
                <h3>Danh mục tin tức nổi bật</h3>
                <?php
                    $query = mysqli_query($con, "select MaTinTuc, TieuDe, tintuc.MoTa, Anh, NgayDang, url from theloai, tintuc where tintuc.MaTL = theloai.MaTL and tintuc.NgayDang = '2021-10-05 15:13:14'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                <ul>
                    <li>    
                        <div class="l1"> <img src="admin/post-images/<?php echo htmlentities($row['Anh']) ?>" style="width: 60px; height: 60px; padding-top:5px;" />
                        <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                            <?php echo htmlentities($row['TieuDe']) ?>
                         </a> 
                        </div>    
                    </li>
                
                </ul>
                <?php } ?>
            </div>
            <div class="quangcao1">
                <li><a href="https://www.asus.com/vn/" >
                    <img src="images/quangcao.png" alt="quang cao" style=" height: 550px; width: 300px; margin-top: 0px;">
                </a></li>
            </div>
        </div>
		
        <!-- <div class="bottom">
            <h1>aaaaaaaaaaaaaaaaaaa</h1>
        </div> -->
		
    </div>
     <!-- Footer -->
      <?php include('includes/footer.php');?>

    <script src="js/index.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> -->
</body>

</html>
