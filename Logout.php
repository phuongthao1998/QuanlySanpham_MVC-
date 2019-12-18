<?php
session_start();
session_destroy();
echo "<h3> Bạn đã đăng xuất khỏi quản trị</h3>";
echo "<a href='Login.php'> Mời đăng nhập lại </a>";
?>