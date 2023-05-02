<?php
session_start();
if(isset($_SESSION['username'])) {
    // 用户已登录，执行相应操作
} else {
    // 用户未登录，重定向到登录页面
    header("Location: LoginSign.php");
}

// 用户已登录，可以继续加载当前页面
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>search</title>
    <link rel="stylesheet" href="./css/search.css">
    <script src="./font_4013428_y9vkbi134e/iconfont.js"></script>
</head>
<body>
<div class="container">

    <header class="header">
        <!-- 头部搜索框 -->
        <div class="search-header">
            <form method="get" class="form1" style=" width: 1000px;height: 30px;min-width: 1000px;height: 40px;display: flex;justify-content: center;align-items: center;">
                <input class="search-input" type="text" name="search_keyword" placeholder="输入关键词" style="height: 40px;">
                <button class="search-btn">搜索</button>
            </form>
        </div>
        <div class="search-msg">
            <div class="itemBar">
                <span class="item">书籍</span>
                <span class="item">文章</span>
                <span class="item">作者</span>
            </div>
        </div>
        <!-- 搜索结果条数 -->
    </header>


    <main class="main">
        <!-- 结果中心区域 -->

        <?php

        // 数据库连接参数
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bookstore";

        // 创建连接
        $conn = new mysqli($servername, $username, $password, $dbname);

        // 检查连接是否成功
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // 构造 SQL 查询语句
        $sql = "SELECT book_name, book_author, book_image, book_publisher, book_genre, book_category, publish_date, book_description, inventory, book_link FROM books";

        // 如果用户提交了搜索关键词
        if (isset($_GET['search_keyword'])) {
            // 获取用户输入的关键词
            $searchKeyword = $_GET['search_keyword'];

            // 构造 SQL 查询语句
            $sql .= " WHERE book_name LIKE '%{$searchKeyword}%' OR book_author LIKE '%{$searchKeyword}%' OR book_publisher LIKE '%{$searchKeyword}%'";
        }

        // 执行查询语句
        $result = $conn->query($sql);

        // 如果查询结果有数据
        if ($result->num_rows > 0) {

            // 输出数据
            while($row = $result->fetch_assoc()) {
                echo "<div class='book-box'>";
                echo "<div class='imgbox'><a href='" . $row["book_link"] . "' target='_blank'><img class='bookimg' src='" . $row["book_image"] . "'></a></div>";
                echo "<div class='book-msg'>";
                echo "<div class='bookname'><a href='" . $row["book_link"] . "' target='_blank'>" . $row["book_name"] . "</a></div>";
                echo "<div class='author'><a href='" . $row["book_link"] . "' target='_blank'>" . $row["book_author"] . "</a></div>";
                echo "</div>";
                echo "</div>";
            }

        } else {
            echo "0 results";
        }

        // 关闭连接
        $conn->close();

        ?>

    </main>

    <footer class="footer">
        <!-- 底部 -->
    </footer>
</div>

</body>
<script>
    /* 添加book-box */
    let btn = document.querySelector(".search-btn");

    let main = document.querySelector(".main");
    function addBox(temp){
    for (var i = 0; i<temp; i++){
        let bookbox = document.createElement("div");
        bookbox.className = "book-box";
        main.appendChild(bookbox);

        let imgbox = document.createElement("div");
        imgbox.className = "imgbox";
        bookbox.appendChild(imgbox);

        let bookmsg = document.createElement("div");
        bookmsg.className = "book-img";
        bookbox.appendChild(bookmsg);

        let img = document.createElement("img");
        img.className = "bookimg";
        imgbox.appendChild(img);

        let bookname = document.createElement("div");
        bookname.className = bookname;
        bookmsg.appendChild(bookname);

        let author = document.createElement("div");
        author.className = "author";
        bookmsg.appendChild(author);
    }
}

// 点击搜索按钮
btn.addEventListener("click", function() {
    let keyword = document.querySelector(".search-input").value; // 获取输入的搜索关键词
    let filter = document.querySelectorAll(".item"); // 获取搜索过滤器

    // 根据过滤器选项设置查询条件
    let filterOption = "";
    for (let i = 0; i < filter.length; i++) {
        if (filter[i].classList.contains("active")) {
            if (filterOption === "") {
                filterOption += "WHERE ";
            } else {
                filterOption += " OR ";
            }
            filterOption += filter[i].dataset.target + " LIKE '%" + keyword + "%'";
        }
    }

    // 如果没有选中任何过滤器，默认以书名、作者、出版商字段进行模糊匹配搜索
    if (filterOption === "") {
        filterOption += "WHERE book_name LIKE '%" + keyword + "%' OR book_author LIKE '%" + keyword + "%' OR book_publisher LIKE '%" + keyword + "%'";
    }

    // 构造 SQL 查询语句
    let sql = "SELECT book_name, book_author, book_image, book_publisher, book_genre, book_category, publish_date, book_description, inventory, book_link FROM books " + filterOption;

    // 发送 Ajax 请求
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.length > 0) {
                    main.innerHTML = ""; // 先清空搜索结果区域
                    for (let i = 0; i < response.length; i++) {
                        let bookbox = document.createElement("div");
                        bookbox.className = "book-box";
                        main.appendChild(bookbox);

                        let imgbox = document.createElement("div");
                        imgbox.className = "imgbox";
                        bookbox.appendChild(imgbox);

                        let bookmsg = document.createElement("div");
                        bookmsg.className = "book-img";
                        bookbox.appendChild(bookmsg);

                        let img = document.createElement("img");
                        img.className = "bookimg";
                        img.setAttribute("src", response[i].book_image);
                        imgbox.appendChild(img);

                        let bookname = document.createElement("div");
                        bookname.className = "bookname";
                        bookname.innerHTML = response[i].book_name;
                        bookmsg.appendChild(bookname);

                        let author = document.createElement("div");
                        author.className = "author";
                        author.innerHTML = response[i].book_author;
                        bookmsg.appendChild(author);
                    }
                } else {
                    alert("没有找到符合条件的书籍");
                }
            }
            else {
                alert("请求出错，错误码：" + xhr.status);
            }
        }
    };
    xhr.open("GET", "search.php?q=" + encodeURI(keyword), true);
    xhr.send();
}
</script>

</body>
</html>
