<?php
// 开始会话并销毁所有数据
session_start();
$_SESSION = array();
session_destroy();

// 跳转到登录页面
header('Location: index.html');
exit();
?>