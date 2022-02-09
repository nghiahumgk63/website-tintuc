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
         		
        <ul>
            <?php
        if (isset( $_GET['form_search']) && $_GET["form_search"] != '') {
            $form_search = $_GET['form_search'];
  $query = "SELECT * FROM tintuc WHERE TieuDe like '%$form_search%'";
     
            $sql = mysqli_query($con, $query);
 			//echo $sql;
            $num = mysqli_num_rows($sql);
            if ($num > 0) {
                echo $num." ket qua tra ve voi tu khoa <b>".$form_search."</b></br>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                foreach( $sql as $row ) {
                    echo '<tr>';?>
					
                    <li style="clear:left; border-bottom:1px solid black; margin-top: 10px">
                            <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                <img src="admin/post-images/<?php echo htmlentities($row['Anh']) ?>" style="width: 100px; height: 75px; float:left" />
                            </a>
                            <h2 style=" margin-bottom:50px; ">
                                <a style=" color:black" href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                    <?php echo htmlentities($row['TieuDe']) ?>
                                </a>
                            </h2>
					</li>
                       
                      <?php
                    echo '</tr>';
                }
                echo '</table>';
            } 
            else {
                echo "Khong tim thay ket qua!";
            }
        }
        ?> 					
        </ul>
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
                    $query = mysqli_query($con, "select MaTinTuc, TieuDe, tintuc.MoTa, Anh, NgayDang, url from tintuc, theloai where theloai.MaTL = tintuc.MaTL and theloai.TenTL = 'công nghệ'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <li>
                            <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                               
                            </a>
                            
                                <a href="<?php echo "detail.php?url=" . htmlentities($row['url']) ?>" title="<?php echo htmlentities($row['TieuDe']) ?>" target="_blank">
                                    <?php echo htmlentities($row['TieuDe']) ?>
                                </a>
                            
                         
                        </li>
                    <?php } ?>
					</li>
                </ul>
            </div>
        </div>
        
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
