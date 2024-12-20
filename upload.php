<?php
// 设置文件上传目录
$targetDir = "uploads/";

// 检查上传目录是否存在，如果不存在则创建
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// 检查是否有文件上传
if (isset($_FILES['file'])) {
    $fileName = basename($_FILES['file']['name']);  // 获取文件名
    $targetFilePath = $targetDir . $fileName;  // 设置目标文件路径

    // 获取文件类型
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // 限制允许的文件类型（这里限制了图片和视频格式）
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'avi', 'mov'];
    if (in_array($fileType, $allowedTypes)) {
        // 检查是否上传成功
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            echo "文件上传成功：$fileName";
        } else {
            echo "文件上传失败，请重试。";
        }
    } else {
        echo "只允许上传图片和视频文件。";
    }
} else {
    echo "没有文件被上传。";
}
?>
