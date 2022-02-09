<div class="top-bar">
    <div class="top-bar-left">
        <a href="add-post.php" class="logo">
            <span>HUMG
                <span>NEWS</span>
            </span>
        </a>
    </div>
    <div class="top-bar-right">
        <div class="dropdown"><a href="add-post.php"><img src="../images/avatar.jpg" alt=""></a>
            <p>Xin chào, <?php echo htmlentities($_SESSION['name']) ?></p>
            <div class="dropdown-content">
                <a href="change-password.php?cid=<?php echo htmlentities($_SESSION['id']);?>">Đổi mật khẩu</a>
                <a href="index.php">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>
<div class="main">
    <div class="main-left">
        <nav>
            <ul class="nav-menu">
                <li>
                    <div class="nav-active">Người dùng</div>
                    <ul>
                        <li class="listmenu"><a href="add-user.php">Thêm người dùng</a></li>
                        <li class="listmenu"><a href="manage-users.php">Quản lý người dùng</a></li>
                    </ul>
                </li>
                <li>
                    <div class="nav-active">Thể loại</div>
                    <ul>
                        <li class="listmenu"><a href="add-category.php">Thêm thể loại</a></li>
                        <li class="listmenu"><a href="manage-categories.php">Quản lý thể loại</a></li>
                    </ul>
                </li>
                <li>
                    <div class="nav-active">Bài viết</div>
                    <ul>
                        <li class="listmenu"><a href="add-post.php">Thêm bài viết</a></li>
                        <li class="listmenu"><a href="manage-post.php">Quản lý bài viết</a></li>
                        <li class="listmenu"><a href="trash.php">Thùng rác</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="help-box">
            <h5 class="text1">Liên lạc</h5>
            <p class=""><span class="text2">Email:</span> <br /> dothihuyen@gmail.com</p>
        </div>
    </div>
    <script>
        var list = document.querySelectorAll('.listmenu a');
        var link = window.location.href;
        for (var i = 0; i < list.length; i++) {
            if (link.includes(list[i].getAttribute("href"))) {
                list[i].style.backgroundColor = '#313a46';
            }
        }
    </script>