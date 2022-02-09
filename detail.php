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
                <a href="#">
                    <h3 style="font-family: 'Times New Roman', Times, serif; color:red">HUMG NEWS</h3>
                </a>
                <ul>
                    <?php
					$url = $_GET['url'];
                    $query = mysqli_query($con, "select TieuDe, MoTa, Anh, NoiDung, NgayDang, url from tintuc where tintuc.url = '". $url . "'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                            <h3 href="#" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                
                            </h3>
                            <h2>
                                <h1 href="<?php echo htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['NoiDung']) ?>" target="_blank">
                                    <?php echo htmlentities($row['TieuDe']) ?>
                                    <p style=" font-size:13px; color:gray; "><?php echo htmlentities($row['NgayDang']) ?></p>
                                    <hr>
                                </h1>
                                <p style=" font-family:GoogleSans-Bold; font-size:18px; color:black;margin-bottom: 70px; "><?php echo htmlentities($row['MoTa']) ?></p>
								<img src="admin/post-images/<?php echo htmlentities($row['Anh']) ?>" style="width: 700px; height: 450px;" />
                            </h2>
                            
							<p style=" font-size:10px; color:gray;margin-bottom: 70px; "><?php echo $row['NoiDung'] ?></p>
                    <?php } ?>

                </ul>
            </div>

        </div>
        <div class="right">
            <div class="quangcao">
                <li><a href="#" >
                    <img src="images/quangcao.png" alt="quang cao" style=" height: 550px; width: 300px; margin-top: 0px;">
                </a></li>
            </div>
            <div class="danhmuc">
                <h3>Danh mục tin tức nổi bật</h3>
                <ul>
                   <li>
					<?php
                    $query = mysqli_query($con, "select MaTinTuc, TieuDe, tintuc.MoTa, Anh, NgayDang, url from tintuc, theloai where theloai.MaTL = tintuc.MaTL and theloai.TenTL = 'Giải trí'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <li>
                            <a href="<?php echo "/webtintuc/Tintuc1/detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                               
                            </a>
                            
                                <a href="<?php echo "/webtintuc/Tintuc1/detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                    <?php echo htmlentities($row['TieuDe']) ?>
                                </a>
                            
                         
                        </li>
                    <?php } ?>
					</li>
                </ul>
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
