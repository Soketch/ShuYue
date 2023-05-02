<?php
//数据库连接信息
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bookstore';

//连接到数据库
$conn = mysqli_connect($host, $username, $password, $dbname);

//检查连接是否成功
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

//查询图书信息
$sql = "SELECT book_name, book_author, book_image, book_publisher, book_genre, book_category, publish_date, book_description, inventory, book_link FROM books";
$result = mysqli_query($conn, $sql);

//检查是否有结果
if (mysqli_num_rows($result) > 0) {
    //输出每一本书的信息
    while($row = mysqli_fetch_assoc($result)) {
        echo "书名: " . $row["book_name"]. "<br>";
        echo "作者: " . $row["book_author"]. "<br>";
        echo "封面图片: <img src='".$row["book_image"]."'><br>";
        echo "出版社: " . $row["book_publisher"]. "<br>";
        echo "流派: " . $row["book_genre"]. "<br>";
        echo "类别: " . $row["book_category"]. "<br>";
        echo "出版日期: " . $row["publish_date"]. "<br>";
        echo "简介: " . $row["book_description"]. "<br>";
        echo "库存: " . $row["inventory"]. "<br>";
        echo "购买链接: <a href='".$row["book_link"]."'>".$row["book_link"]."</a><br><br>";
    }
} else {
    echo "没有找到图书信息。";
}

//关闭数据库连接
mysqli_close($conn);
?>
