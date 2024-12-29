<?php
// 设置响应头，告诉浏览器返回的是图片数据
header('Content-Type: image/jpeg');

// 读取图片并输出
readfile('image/11.jpg');
?>
